<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%medicines}}`.
 */
class m190713_163214_create_medicines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%medicines}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%medicines}}');
    }
}
