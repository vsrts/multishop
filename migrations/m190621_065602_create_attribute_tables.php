<?php

use yii\db\Migration;

/**
 * Class m190621_065602_create_attribute_tables
 */
class m190621_065602_create_attribute_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attribute}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%attribute_value}}', [
            'product_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_attribute_value', '{{%attribute_value}}', ['product_id', 'attribute_id']);

        $this->createIndex('idx_attribute_value_product_id', '{{%attribute_value}}', 'product_id');
        $this->createIndex('idx_attribute_value_attribute_id', '{{%attribute_value}}', 'attribute_id');

        $this->addForeignKey('fk_atribute_value_product_id', '{{%attribute_value}}', 'product_id', '{{%products}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_atribute_value_attribute_id', '{{%attribute_value}}', 'attribute_id', '{{%attribute}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attribute_value}}');
        $this->dropTable('{{%attribute}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190621_065602_create_attribute_tables cannot be reverted.\n";

        return false;
    }
    */
}
