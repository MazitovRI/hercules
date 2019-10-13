<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%breed}}`
 */
class m191010_115142_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'breed_id' => $this->integer()->notNull(),
            'technical_specification' => $this->string(),
            'depth' => $this->string(),
        ]);

        // creates index for column `breed_id`
        $this->createIndex(
            '{{%idx-request-breed_id}}',
            '{{%request}}',
            'breed_id'
        );

        // add foreign key for table `{{%breed}}`
        $this->addForeignKey(
            '{{%fk-request-breed_id}}',
            '{{%request}}',
            'breed_id',
            '{{%breed}}',
            'id',
            'CASCADE'
        );

        // creates index for column `breed_id`
        $this->createIndex(
            '{{%idx-request-client_id}}',
            '{{%request}}',
            'client_id'
        );

        // add foreign key for table `{{%breed}}`
        $this->addForeignKey(
            '{{%fk-request-client_id}}',
            '{{%request}}',
            'client_id',
            '{{%client}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%breed}}`
        $this->dropForeignKey(
            '{{%fk-request-breed_id}}',
            '{{%request}}'
        );

        // drops index for column `breed_id`
        $this->dropIndex(
            '{{%idx-request-breed_id}}',
            '{{%request}}'
        );

        $this->dropTable('{{%request}}');
    }
}
