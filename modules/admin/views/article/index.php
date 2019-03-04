<?php

use app\traits\ImageTrait;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $statuses array */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'alias',
            /*'likes_count:integer',*/
            'description:ntext',
            'content:ntext',
            'date',
            //'image',
            /*'viewed',*/
            //'user_id',
            /*'category_id',*/
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($data) use ($statuses) {
                    return Html::a($statuses[$data->status], ['publish', 'id' => $data->id], ['class' => 'btn btn-default']);
                },
            ],
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data) {
                    return Html::img($data->image_path, [
                        'width' => 200,
                    ]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
