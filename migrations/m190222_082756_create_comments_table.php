<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m190222_082756_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'status' => $this->integer()
        ]);
        // creates index for column `user_id`
        $this->createIndex(
            'idx-post-user_id',
            'comments',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-user_id',
            'comments',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
        // creates index for column `article_id`
        $this->createIndex(
            'idx-article_id',
            'comments',
            'article_id'
        );
        // add foreign key for table `article`
        $this->addForeignKey(
            'fk-article_id',
            'comments',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%comments}}');
    }
}
