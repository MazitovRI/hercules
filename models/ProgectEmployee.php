<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progect_employee".
 *
 * @property int $id
 * @property int $progect_id
 * @property int $employee_id
 *
 * @property Employee $employee
 * @property Progect $progect
 */
class ProgectEmployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progect_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progect_id', 'employee_id'], 'required'],
            [['progect_id', 'employee_id'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['progect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Progect::className(), 'targetAttribute' => ['progect_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'progect_id' => 'Progect ID',
            'employee_id' => 'Employee ID',
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
    public function getProgect()
    {
        return $this->hasOne(Progect::className(), ['id' => 'progect_id']);
    }
}
