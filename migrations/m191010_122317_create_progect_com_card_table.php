<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progect_com_card}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%progect}}`
 * - `{{%competitive_card}}`
 */
class m191010_122317_create_progect_com_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progect_com_card}}', [
            'id' => $this->primaryKey(),
            'progect_id' => $this->integer()->notNull(),
            'com_card' => $this->integer()->notNull(),
        ]);

        // creates index for column `progect_id`
        $this->createIndex(
            '{{%idx-progect_com_card-progect_id}}',
            '{{%progect_com_card}}',
            'progect_id'
        );

        // add foreign key for table `{{%progect}}`
        $this->addForeignKey(
            '{{%fk-progect_com_card-progect_id}}',
            '{{%progect_com_card}}',
            'progect_id',
            '{{%progect}}',
            'id',
            'CASCADE'
        );

        // creates index for column `com_card`
        $this->createIndex(
            '{{%idx-progect_com_card-com_card}}',
            '{{%progect_com_card}}',
            'com_card'
        );

        // add foreign key for table `{{%competitive_card}}`
        $this->addForeignKey(
            '{{%fk-progect_com_card-com_card}}',
            '{{%progect_com_card}}',
            'com_card',
            '{{%competitive_card}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%progect}}`
        $this->dropForeignKey(
            '{{%fk-progect_com_card-progect_id}}',
            '{{%progect_com_card}}'
        );

        // drops index for column `progect_id`
        $this->dropIndex(
            '{{%idx-progect_com_card-progect_id}}',
            '{{%progect_com_card}}'
        );

        // drops foreign key for table `{{%competitive_card}}`
        $this->dropForeignKey(
            '{{%fk-progect_com_card-com_card}}',
            '{{%progect_com_card}}'
        );

        // drops index for column `com_card`
        $this->dropIndex(
            '{{%idx-progect_com_card-com_card}}',
            '{{%progect_com_card}}'
        );

        $this->dropTable('{{%progect_com_card}}');
    }
}
