<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%region}}`
 */
class m191010_111409_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'region_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-city-region_id}}',
            '{{%city}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-city-region_id}}',
            '{{%city}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-city-region_id}}',
            '{{%city}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-city-region_id}}',
            '{{%city}}'
        );

        $this->dropTable('{{%city}}');
    }
}
