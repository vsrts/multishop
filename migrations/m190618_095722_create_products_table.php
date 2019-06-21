<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m190618_095722_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'sku' => $this->integer()->notNull()->unique(),
            'name' => $this->string(),
            'category_id' => $this->integer(),
            'text' => $this->text(),
            'meta_title' => $this->string(),
            'meta_key' => $this->string(),
            'meta_desc' => $this->string(),
        ]);

        $this->createIndex('idx-products_category_id', '{{%products}}', 'category_id');

        $this->addForeignKey('fk_products_category_id', '{{%products}}', 'category_id', '{{%categories}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
