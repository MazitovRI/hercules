<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%breed}}`.
 */
class m191010_113658_create_breed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%breed}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'density' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%breed}}');
    }
}
