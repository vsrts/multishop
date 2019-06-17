<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slides".
 *
 * @property int $id
 * @property string $image
 * @property string $code
 * @property int $sort
 *
 * @property SlidesCities[] $slidesCities
 * @property Cities[] $cities
 */
class Slides extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slides';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'required'],
            [['sort'], 'integer'],
            [['citiesArray'], 'safe'],
            [['image', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Изображение',
            'code' => 'Произвольный код',
            'sort' => 'Порядок',
            'citiesArray' => 'Активен в городах'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlidesCities()
    {
        return $this->hasMany(SlidesCities::className(), ['slides_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['id' => 'cities_id'])->viaTable('slides_cities', ['slides_id' => 'id']);
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
