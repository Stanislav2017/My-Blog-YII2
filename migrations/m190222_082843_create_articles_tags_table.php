<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles_tags}}`.
 */
class m190222_082843_create_articles_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%articles_tags}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer()
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'tag_article_article_id',
            'articles_tags',
            'article_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'tag_article_article_id',
            'articles_tags',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx_tag_id',
            'articles_tags',
            'tag_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tag_id',
            'articles_tags',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%articles_tags}}');
    }
}
