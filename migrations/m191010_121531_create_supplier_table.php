<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supplier}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%num_home}}`
 */
class m191010_121531_create_supplier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'agent' => $this->string(),
            'num_home_id' => $this->integer()->notNull(),
            'org_title' => $this->string(),
            'org_inn' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
        ]);

        // creates index for column `num_home_id`
        $this->createIndex(
            '{{%idx-supplier-num_home_id}}',
            '{{%supplier}}',
            'num_home_id'
        );

        // add foreign key for table `{{%num_home}}`
        $this->addForeignKey(
            '{{%fk-supplier-num_home_id}}',
            '{{%supplier}}',
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
            '{{%fk-supplier-num_home_id}}',
            '{{%supplier}}'
        );

        // drops index for column `num_home_id`
        $this->dropIndex(
            '{{%idx-supplier-num_home_id}}',
            '{{%supplier}}'
        );

        $this->dropTable('{{%supplier}}');
    }
}
