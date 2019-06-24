<?php

use yii\db\Migration;

/**
 * Class m190624_113949_create_stock_tables
 */
class m190624_113949_create_stock_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stock}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'sort' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%city_stock}}', [
            'stock_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk_city_stock', '{{%city_stock}}', ['stock_id', 'city_id']);

        $this->createIndex('idx_stock_id_city_stock', '{{%city_stock}}', 'stock_id');
        $this->createIndex('idx_city_id_city_stock', '{{%city_stock}}', 'city_id');

        $this->addForeignKey('fk_stock_id_city_stock', '{{%city_stock}}', 'stock_id', '{{%stock}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_city_id_city_stock', '{{%city_stock}}', 'city_id', '{{%cities}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city_stock}}');
        $this->dropTable('{{%stock}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190624_113949_create_stock_tables cannot be reverted.\n";

        return false;
    }
    */
}
