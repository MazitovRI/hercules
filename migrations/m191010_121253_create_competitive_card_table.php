<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competitive_card}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m191010_121253_create_competitive_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%competitive_card}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull(),
            'status' => $this->string(),
            'code' => $this->string(),
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-competitive_card-employee_id}}',
            '{{%competitive_card}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-competitive_card-employee_id}}',
            '{{%competitive_card}}',
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
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-competitive_card-employee_id}}',
            '{{%competitive_card}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-competitive_card-employee_id}}',
            '{{%competitive_card}}'
        );

        $this->dropTable('{{%competitive_card}}');
    }
}
