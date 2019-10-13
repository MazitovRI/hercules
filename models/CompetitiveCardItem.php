<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competitive_card_item".
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $com_card_id
 * @property string $price
 * @property string $deliveries_date
 * @property string $manufacture_date
 * @property string $status
 *
 * @property CompetitiveCard $comCard
 * @property Supplier $supplier
 */
class CompetitiveCardItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competitive_card_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplier_id', 'com_card_id'], 'required'],
            [['supplier_id', 'com_card_id'], 'integer'],
            [['deliveries_date', 'manufacture_date'], 'safe'],
            [['price', 'status'], 'string', 'max' => 255],
            [['com_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompetitiveCard::className(), 'targetAttribute' => ['com_card_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_id' => 'Supplier ID',
            'com_card_id' => 'Com Card ID',
            'price' => 'Price',
            'deliveries_date' => 'Deliveries Date',
            'manufacture_date' => 'Manufacture Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComCard()
    {
        return $this->hasOne(CompetitiveCard::className(), ['id' => 'com_card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }
}
