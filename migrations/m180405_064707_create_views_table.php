<?php

use yii\db\Migration;

/**
 * Handles the creation of table `views`.
 */
class m180405_064707_create_views_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('views', [
            'post_id' => $this->integer()->notNull(),
            'user_ip' => $this->string(20)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addPrimaryKey(
            'pk-views',
            'views',
            [
                'post_id',
                'user_ip'
            ]
        );

        $this->createIndex(
            'idx-views-post_id',
            'views',
            'post_id'
        );

        $this->addForeignKey(
            'fk-views-post_id',
            'views',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-views-post_id',
            'views'
        );

        $this->dropIndex(
            'idx-views-post_id',
            'views'
        );

        $this->dropTable('views');
    }
}
