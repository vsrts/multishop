<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m190714_093114_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'created' => $this->dateTime()->defaultExpression('NOW()')->notNull(),
            'updated' => $this->dateTime()->defaultExpression('NOW()')->notNull(),
            'qty' => $this->integer()->notNull(),
            'sum' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx_user_id_order', '{{%order}}', 'user_id');

        $this->addForeignKey('fk_user_id_order', '{{%order}}', 'user_id', 'user', 'id', 'NO ACTION', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
