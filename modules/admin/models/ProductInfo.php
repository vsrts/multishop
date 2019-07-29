<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%product_info}}".
 *
 * Нужно будет определять псевдоним таблицы, тем самы будет выбираться отдельная таблица для города, если префикс не будет определён то будет использоваться дефолтная таблица без префикса. Так нужно чтобы можно было вносить изменения в общее меню а потом при необходимости обновлять(путём копирования с дефолтной таблицы на таблицу с префиксом) его на отдельных городах
 *
 * @property int $id
 * @property int $product_id
 * @property double $price
 * @property string $discount
 * @property int $status
 *
 * @property Products $product
 */
class ProductInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        $session = Yii::$app->session;
        $session->open();
        $alias = $session['alias'];
        if($alias){
            $session->close();
            return $alias . '_product_info';
        }else{
            $session->remove('alias');
            $session->close();
            return 'product_info';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['price'], 'required'],
            [['discount'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'price' => 'Цена',
            'discount' => 'Скидка',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\ProductInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\ProductInfoQuery(get_called_class());
    }
}
