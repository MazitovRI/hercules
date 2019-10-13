<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progect".
 *
 * @property int $id
 * @property int $request_id
 *
 * @property Request $request
 * @property ProgectComCard[] $progectComCards
 * @property ProgectEmployee[] $progectEmployees
 */
class Progect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id'], 'required'],
            [['request_id'], 'integer'],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgectComCards()
    {
        return $this->hasMany(ProgectComCard::className(), ['progect_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgectEmployees()
    {
        return $this->hasMany(ProgectEmployee::className(), ['progect_id' => 'id']);
    }
}
