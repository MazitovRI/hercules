<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%num_home}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%str}}`
 */
class m191010_111939_create_num_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%num_home}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'str_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `str_id`
        $this->createIndex(
            '{{%idx-num_home-str_id}}',
            '{{%num_home}}',
            'str_id'
        );

        // add foreign key for table `{{%str}}`
        $this->addForeignKey(
            '{{%fk-num_home-str_id}}',
            '{{%num_home}}',
            'str_id',
            '{{%str}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%str}}`
        $this->dropForeignKey(
            '{{%fk-num_home-str_id}}',
            '{{%num_home}}'
        );

        // drops index for column `str_id`
        $this->dropIndex(
            '{{%idx-num_home-str_id}}',
            '{{%num_home}}'
        );

        $this->dropTable('{{%num_home}}');
    }
}
