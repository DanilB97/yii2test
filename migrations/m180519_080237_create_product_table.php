<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180519_080237_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string(60)->unique()->notNull(),
            'img' => $this->string(255)->defaultValue('300x200.png')->notNull(),
            'price' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
