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
            [['sku', 'alias'], 'required'],
            [['sku', 'category_id', 'weight', 'kkal', 'count', 'volume'], 'integer'],
            [['text', 'alias'], 'string'],
            [['optionsArray'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['sku', 'alias'], 'unique'],
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
            'optionsArray' => 'Опции'
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

    public function getOptions(){
        return $this->hasMany(Option::className(), ['id' => 'option_id'])->viaTable('product_option', ['product_id' => 'id']);
    }

    private $_optionsArray;

    public function getOptionsArray(){
        if($this->_optionsArray === null){
            $this->_optionsArray = $this->getOptions()->select('id')->column();
        }
        return $this->_optionsArray;
    }

    public function setOptionsArray($value){
        return $this->_optionsArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes){
        $this->updateOptions();
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateOptions(){
        $currentOptionsIds = $this->getOptions()->select('id')->column();
        $newOptionsIds = $this->getOptionsArray();

        foreach(array_filter(array_diff($newOptionsIds, $currentOptionsIds)) as $optionsId){
            if($options = Option::findOne($optionsId)){
                $this->link('options', $options);
            }
        }

        foreach(array_filter(array_diff($currentOptionsIds, $newOptionsIds)) as $optionsId){
            if($options = Option::findOne($optionsId)){
                $this->unlink('options', $options, true);
            }
        }
    }
}
