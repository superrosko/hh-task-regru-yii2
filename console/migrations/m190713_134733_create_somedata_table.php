<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%somedata}}`.
 */
class m190713_134733_create_somedata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%somedata}}', [
            'id' => $this->primaryKey(),
            'a' => $this->string()->null(),
            'b' => $this->string()->null(),
            'date' => $this->timestamp(),
            'type' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%somedata}}');
    }
}
