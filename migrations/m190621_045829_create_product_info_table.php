<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_info}}`.
 */
class m190621_045829_create_product_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_info}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'price' => $this->float(),
            'discount' => $this->string(),
            'status' => $this->integer(),
        ]);

        $this->createIndex('idx_product_info_product_id', '{{%product_info}}', 'product_id');
        $this->addForeignKey('fk_product_info_product_id', '{{%product_info}}', 'product_id', '{{%products}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_info}}');
    }
}
