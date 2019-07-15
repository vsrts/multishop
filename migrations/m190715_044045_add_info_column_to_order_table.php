<?php

use yii\db\Migration;

/**
 * Handles adding info to table `{{%order}}`.
 */
class m190715_044045_add_info_column_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'type_delivery', $this->integer());
        $this->addColumn('order', 'name', $this->string());
        $this->addColumn('order', 'phone', $this->string());
        $this->addColumn('order', 'street', $this->string());
        $this->addColumn('order', 'home', $this->string());
        $this->addColumn('order', 'apart', $this->string());
        $this->addColumn('order', 'comment', $this->text());
        $this->dropColumn('order', 'qty');
        $this->dropColumn('order', 'status');
        $this->addColumn('order', 'status', $this->integer()->defaultValue('0'));
        $this->dropColumn('order_items', 'discount');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order', 'type_delivery');
        $this->dropColumn('order', 'name');
        $this->dropColumn('order', 'phone');
        $this->dropColumn('order', 'street');
        $this->dropColumn('order', 'home');
        $this->dropColumn('order', 'apart');
        $this->dropColumn('order', 'comment');
        $this->addColumn('order', 'qty', $this->integer());
    }
}
