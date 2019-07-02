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
 * @property ProductInfo[] $productInfo
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
            [['sku', 'category_id', 'weight', 'kkal', 'count', 'volume'], 'integer'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'sku' => 'Артикул',
            'name' => 'Наименование',
            'category_id' => 'Категория',
            'text' => 'Описание',
            'weight' => 'Вес',
            'kkal' => 'Калории',
            'count' => 'Количество в порции',
            'volume' => 'Объём',
            'price' => 'Цена',
            'discount' => 'Скидка',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductInfo()
    {
        return $this->hasOne(ProductInfo::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
