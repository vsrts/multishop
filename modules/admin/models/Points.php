<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property int $id
 * @property int $city
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int $filial
 * @property int $status
 *
 * @property Cities $city0
 */
class Points extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'phone', 'time', 'email', 'address'], 'required'],
            [['city', 'filial', 'status', 'manager', 'min_sum'], 'integer'],
            [['categoriesArray'], 'safe'],
            [['phone', 'second_phone', 'email', 'address', 'time', 'control', 'api_key'], 'string', 'max' => 255],
            [['city'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Город',
            'phone' => 'Телефон',
            'second_phone' => 'Дополнительный телефон',
            'email' => 'Email',
            'address' => 'Адрес',
            'time' => 'Время работы',
            'control' => 'Контроль качества',
            'manager' => 'Управляющий',
            'filial' => 'ID филиала',
            'api_key' => 'Ключ API',
            'min_sum' => 'Минимальная сумма заказа',
            'status' => 'Статус',
            'points' => 'Активные категории',
            'categoriesArray' => 'Доступные категории'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city']);
    }
//    public function getManager0()
//    {
//        return $this->hasOne(User::className(), ['id' => 'manager']);
//    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'manager']);
    }

    public function getPointCategories(){
        return $this->hasMany(PointCategories::className(), ['point_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->viaTable('point_categories', ['point_id' => 'id']);
    }

    private $_categoriesArray;

    public function getCategoriesArray()
    {
        if($this->_categoriesArray === null){
            $this->_categoriesArray = $this->getCategories()->select('id')->column();
        }
        return $this->_categoriesArray;
    }

    public function setCategoriesArray($value){
        return $this->_categoriesArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes){
        $this->updateCategories();
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateCategories(){
        $currentCategoriesIds = $this->getCategories()->select('id')->column();
        $newCategoriesIds = $this->getCategoriesArray();

        foreach (array_filter(array_diff($newCategoriesIds, $currentCategoriesIds)) as $categoriesId){
            if($categories = Categories::findOne($categoriesId)){
                $this->link('categories', $categories);
            }
        }

        foreach (array_filter(array_diff($currentCategoriesIds, $newCategoriesIds)) as $categoriesId){
            if($categories = Categories::findOne($categoriesId)){
                $this->unlink('categories', $categories, true);
            }
        }

    }

}
