<?php

use yii\db\Migration;

/**
 * Handles adding description to table `{{%categories}}`.
 */
class m190618_094547_add_description_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'description', $this->text());
        $this->addColumn('categories', 'meta_title', $this->string());
        $this->addColumn('categories', 'meta_key', $this->string());
        $this->addColumn('categories', 'meta_desc', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'description');
    }
}
