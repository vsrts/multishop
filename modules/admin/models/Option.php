<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $sku
 * @property int $price
 *
 * @property ProductOption[] $productOptions
 * @property Products[] $products
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sku', 'price'], 'required'],
            [['sku', 'price'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'sku' => 'Sku',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('product_option', ['option_id' => 'id']);
    }
}
