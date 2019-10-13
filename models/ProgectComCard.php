<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progect_com_card".
 *
 * @property int $id
 * @property int $progect_id
 * @property int $com_card
 *
 * @property CompetitiveCard $comCard
 * @property Progect $progect
 */
class ProgectComCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progect_com_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progect_id', 'com_card'], 'required'],
            [['progect_id', 'com_card'], 'integer'],
            [['com_card'], 'exist', 'skipOnError' => true, 'targetClass' => CompetitiveCard::className(), 'targetAttribute' => ['com_card' => 'id']],
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
            'com_card' => 'Com Card',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComCard()
    {
        return $this->hasOne(CompetitiveCard::className(), ['id' => 'com_card']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgect()
    {
        return $this->hasOne(Progect::className(), ['id' => 'progect_id']);
    }
}
