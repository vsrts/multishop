<?php

use yii\db\Migration;

/**
 * Handles adding alias to table `{{%products}}`.
 */
class m190705_055138_add_alias_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'alias', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'alias');
    }
}
