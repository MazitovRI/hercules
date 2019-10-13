<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "num_home".
 *
 * @property int $id
 * @property string $name
 * @property int $str_id
 *
 * @property Client[] $clients
 * @property Str $str
 * @property Supplier[] $suppliers
 */
class NumHome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'num_home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['str_id'], 'required'],
            [['str_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['str_id'], 'exist', 'skipOnError' => true, 'targetClass' => Str::className(), 'targetAttribute' => ['str_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'str_id' => 'Str ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['num_home_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStr()
    {
        return $this->hasOne(Str::className(), ['id' => 'str_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['num_home_id' => 'id']);
    }
}
