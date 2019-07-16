<?php

use yii\db\Migration;

/**
 * Handles adding image to table `{{%products}}`.
 */
class m190716_074255_add_image_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'image', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products', 'image');
    }
}
