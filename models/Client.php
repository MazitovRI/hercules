<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $agent
 * @property int $num_home_id
 * @property string $org_title
 * @property string $org_inn
 * @property string $phone
 * @property string $email
 * @property string $login
 * @property string $password
 *
 * @property NumHome $numHome
 * @property Request[] $requests
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_home_id', 'login', 'password'], 'required'],
            [['num_home_id'], 'integer'],
            [['agent', 'org_title', 'org_inn', 'phone', 'email', 'login', 'password'], 'string', 'max' => 255],
            [['num_home_id'], 'exist', 'skipOnError' => true, 'targetClass' => NumHome::className(), 'targetAttribute' => ['num_home_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agent' => 'Agent',
            'num_home_id' => 'Num Home ID',
            'org_title' => 'Org Title',
            'org_inn' => 'Org Inn',
            'phone' => 'Phone',
            'email' => 'Email',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumHome()
    {
        return $this->hasOne(NumHome::className(), ['id' => 'num_home_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['client_id' => 'id']);
    }
}
