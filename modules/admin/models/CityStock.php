<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "city_stock".
 *
 * @property int $stock_id
 * @property int $city_id
 *
 * @property Cities $city
 * @property Stock $stock
 */
class CityStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'city_id'], 'required'],
            [['stock_id', 'city_id'], 'integer'],
            [['stock_id', 'city_id'], 'unique', 'targetAttribute' => ['stock_id', 'city_id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::className(), 'targetAttribute' => ['stock_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stock_id' => 'Stock ID',
            'city_id' => 'City ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::className(), ['id' => 'stock_id']);
    }
}
