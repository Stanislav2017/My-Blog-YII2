<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m190222_082622_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->unique(),
            'alias' => $this->string()->unique(),
            'description' => $this->text(),
            'content' => $this->text(),
            'date' => $this->date()->defaultValue(date('Y-m-d')),
            'image' => $this->string(),
            'viewed' => $this->integer()->defaultValue(0),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%articles}}');
    }
}
