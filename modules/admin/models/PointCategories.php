<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "point_categories".
 *
 * @property int $id
 * @property int $point_id
 * @property int $category_id
 * @property int $status
 *
 * @property Points $point
 * @property Categories $category
 */
class PointCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'point_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['point_id', 'category_id', 'status'], 'required'],
            [['point_id', 'category_id', 'status'], 'integer'],
            [['point_id'], 'exist', 'skipOnError' => true, 'targetClass' => Points::className(), 'targetAttribute' => ['point_id' => 'id']],
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
            'point_id' => 'Point ID',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'categories' => 'Доступные категории',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoint()
    {
        return $this->hasOne(Points::className(), ['id' => 'point_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
