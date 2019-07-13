<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%disease}}`.
 */
class m190713_163218_create_disease_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%disease}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%disease}}');
    }
}
