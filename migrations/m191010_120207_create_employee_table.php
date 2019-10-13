<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 * - `{{%job}}`
 */
class m191010_120207_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer()->notNull(),
            'job_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'pname' => $this->string(),
            'phon' => $this->string(),
            'hiring_date' => $this->date(),
            'berth_date' => $this->date(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-employee-department_id}}',
            '{{%employee}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-employee-department_id}}',
            '{{%employee}}',
            'department_id',
            '{{%department}}',
            'id',
            'CASCADE'
        );

        // creates index for column `job_id`
        $this->createIndex(
            '{{%idx-employee-job_id}}',
            '{{%employee}}',
            'job_id'
        );

        // add foreign key for table `{{%job}}`
        $this->addForeignKey(
            '{{%fk-employee-job_id}}',
            '{{%employee}}',
            'job_id',
            '{{%job}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-employee-department_id}}',
            '{{%employee}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-employee-department_id}}',
            '{{%employee}}'
        );

        // drops foreign key for table `{{%job}}`
        $this->dropForeignKey(
            '{{%fk-employee-job_id}}',
            '{{%employee}}'
        );

        // drops index for column `job_id`
        $this->dropIndex(
            '{{%idx-employee-job_id}}',
            '{{%employee}}'
        );

        $this->dropTable('{{%employee}}');
    }
}
