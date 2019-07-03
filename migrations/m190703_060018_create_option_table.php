<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option}}`.
 */
class m190703_060018_create_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%option}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'sku' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%product_option}}', [
            'product_id' => $this->integer()->notNull(),
            'option_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_product_option', '{{%product_option}}', ['product_id', 'option_id']);

        $this->createIndex('idx_product_id_product_option', '{{%product_option}}', 'product_id');
        $this->createIndex('idx_option_id_product_option', '{{%product_option}}', 'option_id');

        $this->addForeignKey('fk_product_id_product_option', '{{%product_option}}', 'product_id', 'products', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_option_id_product_option', '{{%product_option}}', 'option_id', '{{%option}}', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_option}}');
        $this->dropTable('{{%option}}');
    }
}
