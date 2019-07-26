<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property int $id
 * @property int $city
 * @property string $phone
 * @property string $second_phone
 * @property string $email
 * @property string $address
 * @property string $time
 * @property string $control
 * @property int $manager
 * @property int $min_sum
 * @property int $filial
 * @property string $api_key
 * @property int $status
 *
 * @property Area[] $areas
 * @property PointCategories[] $pointCategories
 * @property Categories[] $categories
 * @property Cities $city0
 * @property User $manager0
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
            [['city', 'phone', 'email', 'address'], 'required'],
            [['city', 'manager', 'min_sum', 'filial', 'status'], 'integer'],
            [['phone', 'second_phone', 'email', 'address', 'time', 'control', 'api_key'], 'string', 'max' => 255],
            [['city'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city' => 'id']],
            [['manager'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['manager' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'phone' => 'Phone',
            'second_phone' => 'Second Phone',
            'email' => 'Email',
            'address' => 'Address',
            'time' => 'Time',
            'control' => 'Control',
            'manager' => 'Manager',
            'min_sum' => 'Min Sum',
            'filial' => 'Filial',
            'api_key' => 'Api Key',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPointCategories()
    {
        return $this->hasMany(PointCategories::className(), ['point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->viaTable('point_categories', ['point_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity0()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager0()
    {
        return $this->hasOne(User::className(), ['id' => 'manager']);
    }
}
