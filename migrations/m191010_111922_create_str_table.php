<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%str}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 */
class m191010_111922_create_str_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%str}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'city_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `city_id`
        $this->createIndex(
            '{{%idx-str-city_id}}',
            '{{%str}}',
            'city_id'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-str-city_id}}',
            '{{%str}}',
            'city_id',
            '{{%city}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-str-city_id}}',
            '{{%str}}'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            '{{%idx-str-city_id}}',
            '{{%str}}'
        );

        $this->dropTable('{{%str}}');
    }
}
