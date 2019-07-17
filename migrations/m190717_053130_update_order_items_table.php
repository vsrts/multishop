<?php

use yii\db\Migration;

/**
 * Class m190717_053130_update_order_items_table
 */
class m190717_053130_update_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_product_id_order_items', '{{%order_items}}');
        $this->dropIndex('idx_product_id_order_items', '{{%order_items}}');

        $this->dropColumn('order_items', 'product_id');
        $this->addColumn('order_items', 'product_id', $this->integer());

        $this->createIndex('idx_product_id_order_items', '{{%order_items}}', 'product_id');
        $this->addForeignKey('fk_product_id_order_items', '{{%order_items}}', 'product_id', 'products', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }


}
