<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180404_091959_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'body' => $this->text()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->createIndex(
            'idx-comments-post_id',
            'comments',
            'post_id'
        );

        $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'post',
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
            'fk-comments-post_id',
            'comments'
        );

        $this->dropIndex(
            'idx-comments-post-id',
            'comments'
        );

        $this->dropTable('comments');
    }
}
