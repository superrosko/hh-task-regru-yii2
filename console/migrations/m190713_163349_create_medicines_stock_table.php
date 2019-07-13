<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%medicines_stock}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%medicines}}`
 */
class m190713_163349_create_medicines_stock_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%medicines_stock}}', [
            'id' => $this->primaryKey(),
            'medicines_id' => $this->integer()->notNull(),
            'expiry_date' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `medicines_id`
        $this->createIndex(
            '{{%idx-medicines_stock-medicines_id}}',
            '{{%medicines_stock}}',
            'medicines_id'
        );

        // add foreign key for table `{{%medicines}}`
        $this->addForeignKey(
            '{{%fk-medicines_stock-medicines_id}}',
            '{{%medicines_stock}}',
            'medicines_id',
            '{{%medicines}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%medicines}}`
        $this->dropForeignKey(
            '{{%fk-medicines_stock-medicines_id}}',
            '{{%medicines_stock}}'
        );

        // drops index for column `medicines_id`
        $this->dropIndex(
            '{{%idx-medicines_stock-medicines_id}}',
            '{{%medicines_stock}}'
        );

        $this->dropTable('{{%medicines_stock}}');
    }
}
