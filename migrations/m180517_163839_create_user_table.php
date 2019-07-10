<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180517_163839_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'email' => $this->string(64)->unique()->notNull(),
            'password' => $this->string()->unique()->notNull(),
            'reg_date' => $this->timestamp()->notNull(). ' DEFAULT CURRENT_TIMESTAMP',
            'level' => $this->string()->defaultValue('user')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
