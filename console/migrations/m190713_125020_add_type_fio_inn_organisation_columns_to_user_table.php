<?php

use yii\db\Migration;

/**
 * Handles adding type_fio_inn_organisation to table `{{%user}}`.
 */
class m190713_125020_add_type_fio_inn_organisation_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'type', $this->boolean());
        $this->addColumn('{{%user}}', 'fio', $this->string());
        $this->addColumn('{{%user}}', 'inn', $this->bigInteger());
        $this->addColumn('{{%user}}', 'organisation', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'type');
        $this->dropColumn('{{%user}}', 'fio');
        $this->dropColumn('{{%user}}', 'inn');
        $this->dropColumn('{{%user}}', 'organisation');
    }
}
