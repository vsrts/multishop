<?php

namespace app\models;

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
            'image' => 'Image',
            'code' => 'Code',
            'sort' => 'Sort',
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
}
