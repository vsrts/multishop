<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $image
 * @property string $text
 * @property int $sort
 *
 * @property CityStock[] $cityStocks
 * @property Cities[] $cities
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'text', 'sort'], 'required'],
            [['text'], 'string'],
            [['sort'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['image'], 'file'],
            [['citiesArray'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'image' => 'Изображение',
            'text' => 'Текст',
            'sort' => 'Порядок',
            'citiesArray' => 'Активен в городах',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityStocks()
    {
        return $this->hasMany(CityStock::className(), ['stock_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['id' => 'city_id'])->viaTable('city_stock', ['stock_id' => 'id']);
    }

    private $_citiesArray;

    public function getCitiesArray()
    {
        if($this->_citiesArray === null){
            $this->_citiesArray = $this->getCities()->select('id')->column();
        }
        return $this->_citiesArray;
    }

    public function setCitiesArray($value){
        return $this->_citiesArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes){
        $this->updateCities();
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateCities(){
        $currentCitiesIds = $this->getCities()->select('id')->column();
        $newCitiesIds = $this->getCitiesArray();

        foreach (array_filter(array_diff($newCitiesIds, $currentCitiesIds)) as $citiesId){
            if($cities = Cities::findOne($citiesId)){
                $this->link('cities', $cities);
            }
        }

        foreach (array_filter(array_diff($currentCitiesIds, $newCitiesIds)) as $citiesId){
            if($cities = Cities::findOne($citiesId)){
                $this->unlink('cities', $cities, true);
            }
        }

    }
}
