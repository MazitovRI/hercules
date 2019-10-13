<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $agent
 * @property int $num_home_id
 * @property string $org_title
 * @property string $org_inn
 * @property string $phone
 * @property string $email
 *
 * @property CompetitiveCardItem[] $competitiveCardItems
 * @property NumHome $numHome
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_home_id'], 'required'],
            [['num_home_id'], 'integer'],
            [['agent', 'org_title', 'org_inn', 'phone', 'email'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitiveCardItems()
    {
        return $this->hasMany(CompetitiveCardItem::className(), ['supplier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumHome()
    {
        return $this->hasOne(NumHome::className(), ['id' => 'num_home_id']);
    }
}
