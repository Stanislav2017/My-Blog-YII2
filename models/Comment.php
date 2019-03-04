<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $article_id
 * @property int $status
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_PUBLISHED = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'status'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['user_id'], 'integer'],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['status'], 'integer'],
            [['status'], 'default', 'value' => self::STATUS_WAIT]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'user_id' => 'User ID',
            'article_id' => 'Article ID',
            'status' => 'Status',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
