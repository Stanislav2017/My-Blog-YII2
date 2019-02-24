<?php

namespace app\models;

use app\traits\ImageTrait;
use function date;
use const false;
use function strtolower;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $category_id
 */
class Article extends \yii\db\ActiveRecord
{
    use ImageTrait;

    public $image_path;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const STATUS_CREATED = 0;
    const STATUS_PUBLISHED = 1;

    public function afterFind()
    {
        $this->image_path = '@web/' . $this->buildFilePath('article', $this->image);
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['title', 'description', 'date', 'viewed', 'content', 'image', 'status'];
        $scenarios[self::SCENARIO_UPDATE] = ['title', 'description', 'date', 'viewed', 'content', 'image', 'status'];
        $scenarios[self::SCENARIO_DEFAULT] = self::SCENARIO_CREATE;
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer', 'min' => self::STATUS_CREATED, 'max' => self::STATUS_PUBLISHED],
            [['status'], 'default', 'value' =>  self::STATUS_CREATED, 'on' => self::SCENARIO_CREATE],
            [['title', 'description', 'content'], 'string'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['viewed'], 'default', 'value' => 0, 'on' => self::SCENARIO_CREATE],
            /*[['user_id'], 'default', 'value' => Yii::$app->getUser()->id],*/
            /*[['image'], 'default', 'value' => md5(time()) . '.png', 'on' => self::SCENARIO_CREATE],*/
            [['image'], 'file', 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Содержание',
            'date' => 'Дата создания',
            'image' => 'Изображение',
//            'viewed' => 'Viewed',
//            'user_id' => 'User ID',
//            'status' => 'Status',
            'category_id' => 'Категория',
        ];
    }

   public function review()
   {
       $this->viewed += 1;
       $this->save(false);
   }

   public function publish()
   {
       $this->status = !$this->status;
       $this->save(false);
   }
}
