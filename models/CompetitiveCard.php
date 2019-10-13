<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competitive_card".
 *
 * @property int $id
 * @property int $employee_id
 * @property string $status
 * @property string $code
 *
 * @property Employee $employee
 * @property CompetitiveCardItem[] $competitiveCardItems
 * @property ProgectComCard[] $progectComCards
 */
class CompetitiveCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competitive_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id'], 'integer'],
            [['status', 'code'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'status' => 'Status',
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitiveCardItems()
    {
        return $this->hasMany(CompetitiveCardItem::className(), ['com_card_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgectComCards()
    {
        return $this->hasMany(ProgectComCard::className(), ['com_card' => 'id']);
    }
}
