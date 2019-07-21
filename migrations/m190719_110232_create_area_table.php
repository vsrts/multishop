<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%area}}`.
 */
class m190719_110232_create_area_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%area}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'point_id' => $this->integer(),
            'status' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx_city_id_area', '{{%area}}', 'city_id');
        $this->createIndex('idx_point_id_area', '{{%area}}', 'point_id');

        $this->addForeignKey('fk_city_id_area', '{{%area}}', 'city_id', 'cities', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_point_id_area', '{{%area}}', 'point_id', 'points', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%area}}');
    }
}
