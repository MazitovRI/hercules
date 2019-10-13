<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competitive_card_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%supplier}}`
 * - `{{%competitive_card}}`
 */
class m191010_122034_create_competitive_card_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%competitive_card_item}}', [
            'id' => $this->primaryKey(),
            'supplier_id' => $this->integer()->notNull(),
            'com_card_id' => $this->integer()->notNull(),
            'price' => $this->string(),
            'deliveries_date' => $this->date(),
            'manufacture_date' => $this->date(),
            'status' => $this->string(),
        ]);

        // creates index for column `supplier_id`
        $this->createIndex(
            '{{%idx-competitive_card_item-supplier_id}}',
            '{{%competitive_card_item}}',
            'supplier_id'
        );

        // add foreign key for table `{{%supplier}}`
        $this->addForeignKey(
            '{{%fk-competitive_card_item-supplier_id}}',
            '{{%competitive_card_item}}',
            'supplier_id',
            '{{%supplier}}',
            'id',
            'CASCADE'
        );

        // creates index for column `com_card_id`
        $this->createIndex(
            '{{%idx-competitive_card_item-com_card_id}}',
            '{{%competitive_card_item}}',
            'com_card_id'
        );

        // add foreign key for table `{{%competitive_card}}`
        $this->addForeignKey(
            '{{%fk-competitive_card_item-com_card_id}}',
            '{{%competitive_card_item}}',
            'com_card_id',
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
        // drops foreign key for table `{{%supplier}}`
        $this->dropForeignKey(
            '{{%fk-competitive_card_item-supplier_id}}',
            '{{%competitive_card_item}}'
        );

        // drops index for column `supplier_id`
        $this->dropIndex(
            '{{%idx-competitive_card_item-supplier_id}}',
            '{{%competitive_card_item}}'
        );

        // drops foreign key for table `{{%competitive_card}}`
        $this->dropForeignKey(
            '{{%fk-competitive_card_item-com_card_id}}',
            '{{%competitive_card_item}}'
        );

        // drops index for column `com_card_id`
        $this->dropIndex(
            '{{%idx-competitive_card_item-com_card_id}}',
            '{{%competitive_card_item}}'
        );

        $this->dropTable('{{%competitive_card_item}}');
    }
}
