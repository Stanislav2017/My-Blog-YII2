<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%likes}}`.
 */
class m190226_071815_create_likes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%likes}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'object_id' => $this->integer(),
            'object_type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%likes}}');
    }
}
