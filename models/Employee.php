<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int $department_id
 * @property int $job_id
 * @property string $name
 * @property string $surname
 * @property string $pname
 * @property string $phon
 * @property string $hiring_date
 * @property string $berth_date
 * @property string $login
 * @property string $password
 *
 * @property CompetitiveCard[] $competitiveCards
 * @property Department $department
 * @property Job $job
 * @property ProgectEmployee[] $progectEmployees
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id', 'job_id', 'login', 'password'], 'required'],
            [['department_id', 'job_id'], 'integer'],
            [['hiring_date', 'berth_date'], 'safe'],
            [['name', 'surname', 'pname', 'phon', 'login', 'password'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_id' => 'Department ID',
            'job_id' => 'Job ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'pname' => 'Pname',
            'phon' => 'Phon',
            'hiring_date' => 'Hiring Date',
            'berth_date' => 'Berth Date',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitiveCards()
    {
        return $this->hasMany(CompetitiveCard::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgectEmployees()
    {
        return $this->hasMany(ProgectEmployee::className(), ['employee_id' => 'id']);
    }
}
