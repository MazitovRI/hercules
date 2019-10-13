<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%num_home}}`
 */
class m191010_113622_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'agent' => $this->string(),
            'num_home_id' => $this->integer()->notNull(),
            'org_title' => $this->string(),
            'org_inn' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
        ]);

        // creates index for column `num_home_id`
        $this->createIndex(
            '{{%idx-client-num_home_id}}',
            '{{%client}}',
            'num_home_id'
        );

        // add foreign key for table `{{%num_home}}`
        $this->addForeignKey(
            '{{%fk-client-num_home_id}}',
            '{{%client}}',
            'num_home_id',
            '{{%num_home}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%num_home}}`
        $this->dropForeignKey(
            '{{%fk-client-num_home_id}}',
            '{{%client}}'
        );

        // drops index for column `num_home_id`
        $this->dropIndex(
            '{{%idx-client-num_home_id}}',
            '{{%client}}'
        );

        $this->dropTable('{{%client}}');
    }
}
