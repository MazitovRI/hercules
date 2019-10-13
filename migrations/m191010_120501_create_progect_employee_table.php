<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progect_employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%progect}}`
 */
class m191010_120501_create_progect_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progect_employee}}', [
            'id' => $this->primaryKey(),
            'progect_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `progect_id`
        $this->createIndex(
            '{{%idx-progect_employee-progect_id}}',
            '{{%progect_employee}}',
            'progect_id'
        );

        // add foreign key for table `{{%progect}}`
        $this->addForeignKey(
            '{{%fk-progect_employee-progect_id}}',
            '{{%progect_employee}}',
            'progect_id',
            '{{%progect}}',
            'id',
            'CASCADE'
        );

        // creates index for column `progect_id`
        $this->createIndex(
            '{{%idx-progect_employee-employee_id}}',
            '{{%progect_employee}}',
            'employee_id'
        );

        // add foreign key for table `{{%progect}}`
        $this->addForeignKey(
            '{{%fk-progect_employee-employee_id}}',
            '{{%progect_employee}}',
            'employee_id',
            '{{%employee}}',
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
            '{{%fk-progect_employee-progect_id}}',
            '{{%progect_employee}}'
        );

        // drops index for column `progect_id`
        $this->dropIndex(
            '{{%idx-progect_employee-progect_id}}',
            '{{%progect_employee}}'
        );

        $this->dropTable('{{%progect_employee}}');
    }
}
