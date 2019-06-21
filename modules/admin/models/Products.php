<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $sku
 * @property string $name
 * @property int $category_id
 * @property string $text
 * @property string $meta_title
 * @property string $meta_key
 * @property string $meta_desc
 *
 * @property AttributeValue[] $attributeValues
 * @property Attribute[] $attributes0
 * @property ProductInfo[] $productInfos
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku'], 'required'],
            [['sku', 'category_id'], 'integer'],
            [['text'], 'string'],
            [['name', 'meta_title', 'meta_key', 'meta_desc'], 'string', 'max' => 255],
            [['sku'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku' => 'Sku',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'text' => 'Text',
            'meta_title' => 'Meta Title',
            'meta_key' => 'Meta Key',
            'meta_desc' => 'Meta Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeValues()
    {
        return $this->hasMany(AttributeValue::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes()
    {
        return $this->hasMany(Attribute::className(), ['id' => 'attribute_id'])->viaTable('attribute_value', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductInfos()
    {
        return $this->hasMany(ProductInfo::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
