<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property string $created
 * @property string $updated
 * @property int $qty
 * @property int $sum
 * @property int $status
 * @property int $user_id
 *
 * @property User $user
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['sum', 'user_id'], 'required'],
            [['sum', 'status', 'user_id', 'type_delivery', 'phone', 'home', 'apart'], 'integer'],
            [['name', 'street'], 'string', 'max'=>255],
            [['comment'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User Id',
            'type_delivery' => 'Способ доставки',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'street' => 'Улица',
            'home' => 'Дом',
            'apart' => 'Квартира',
            'comment' => 'Комментарий к заказу',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
}
