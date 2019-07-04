<?php

use yii\db\Migration;

/**
 * Handles adding image to table `{{%categories}}`.
 */
class m190704_120835_add_image_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'image', $this->string());
        $this->addColumn('categories', 'icon', $this->string());
        $this->addColumn('categories', 'alias', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'image');
        $this->dropColumn('categories', 'icon');
        $this->dropColumn('categories', 'alias');
    }
}
