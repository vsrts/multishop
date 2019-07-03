<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product_option".
 *
 * @property int $product_id
 * @property int $option_id
 *
 * @property Option $option
 * @property Products $product
 */
class ProductOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'option_id'], 'required'],
            [['product_id', 'option_id'], 'integer'],
            [['product_id', 'option_id'], 'unique', 'targetAttribute' => ['product_id', 'option_id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'option_id' => 'Option ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
