<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%medicines_disease}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%medicines}}`
 * - `{{%disease}}`
 */
class m190713_163228_create_medicines_disease_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%medicines_disease}}', [
            'id' => $this->primaryKey(),
            'medicines_id' => $this->integer()->notNull(),
            'disease_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `medicines_id`
        $this->createIndex(
            '{{%idx-medicines_disease-medicines_id}}',
            '{{%medicines_disease}}',
            'medicines_id'
        );

        // add foreign key for table `{{%medicines}}`
        $this->addForeignKey(
            '{{%fk-medicines_disease-medicines_id}}',
            '{{%medicines_disease}}',
            'medicines_id',
            '{{%medicines}}',
            'id',
            'CASCADE'
        );

        // creates index for column `disease_id`
        $this->createIndex(
            '{{%idx-medicines_disease-disease_id}}',
            '{{%medicines_disease}}',
            'disease_id'
        );

        // add foreign key for table `{{%disease}}`
        $this->addForeignKey(
            '{{%fk-medicines_disease-disease_id}}',
            '{{%medicines_disease}}',
            'disease_id',
            '{{%disease}}',
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
            '{{%fk-medicines_disease-medicines_id}}',
            '{{%medicines_disease}}'
        );

        // drops index for column `medicines_id`
        $this->dropIndex(
            '{{%idx-medicines_disease-medicines_id}}',
            '{{%medicines_disease}}'
        );

        // drops foreign key for table `{{%disease}}`
        $this->dropForeignKey(
            '{{%fk-medicines_disease-disease_id}}',
            '{{%medicines_disease}}'
        );

        // drops index for column `disease_id`
        $this->dropIndex(
            '{{%idx-medicines_disease-disease_id}}',
            '{{%medicines_disease}}'
        );

        $this->dropTable('{{%medicines_disease}}');
    }
}
