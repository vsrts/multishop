<?php

use yii\db\Migration;

/**
 * Handles adding alias to table `{{%cities}}`.
 */
class m190722_054636_add_alias_column_to_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%cities}}', 'alias', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%cities}}', 'alias');
    }
}
