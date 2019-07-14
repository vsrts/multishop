<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m190714_110519_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'discount' => $this->integer(),
            'qty_item' => $this->integer()->notNull(),
            'sum_item' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx_order_id_order_items', '{{%order_items}}', 'order_id');
        $this->createIndex('idx_product_id_order_items', '{{%order_items}}', 'product_id');

        $this->addForeignKey('fk_order_id_order_items', '{{%order_items}}', 'order_id', 'order', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_product_id_order_items', '{{%order_items}}', 'product_id', 'products', 'id', 'NO ACTION', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_items}}');
    }
}
