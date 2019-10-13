<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progect}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%recuest}}`
 */
class m191010_115411_create_progect_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progect}}', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            '{{%idx-progect-request_id}}',
            '{{%progect}}',
            'request_id'
        );

        // add foreign key for table `{{%recuest}}`
        $this->addForeignKey(
            '{{%fk-progect-request_id}}',
            '{{%progect}}',
            'request_id',
            '{{%request}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%recuest}}`
        $this->dropForeignKey(
            '{{%fk-progect-request_id}}',
            '{{%progect}}'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            '{{%idx-progect-request_id}}',
            '{{%progect}}'
        );

        $this->dropTable('{{%progect}}');
    }
}
