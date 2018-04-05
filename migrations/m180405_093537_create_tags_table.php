<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m180405_093537_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'title' => $this->string(20)->notNull()->unique(),
            'status' => $this->string(20)->notNull()->defaultValue('default')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags');
    }
}
