<?php
use yii\helpers\Html;
use yii\helpers\Url;

/*@var $model app/models/Article*/
?>

<div class="card mb-4">
    <?php echo Html::img($model->image_path, [
        'class' => 'card-img-top',
        'alt' => 'Card image cap',
        'height' => 300,
        'width' => 750
    ]); ?>
    <div class="card-body">
        <h2 class="card-title"><?php echo $model->title ?></h2>
        <p class="card-text"><?php echo $model->description ?></p>
        <a class='btn btn-secondary' href="<?php echo Url::toRoute(['site/view', 'alias' => $model->alias]) ?>">
            Read More  &rarr;
        </a>
    </div>
    <div class="card-footer text-muted">
        Posted on <?php echo date('M d, Y', strtotime($model->date)); ?>
        by <a><?php echo $model->user->username ?></a>
        <span class="float-right">
            <i id="like"
               data-id="<?php echo $model->id ?>"
               class="<?php echo (isset($_SESSION['article']['likes'][$model->id]) && in_array(Yii::$app->user->id, $_SESSION['article']['likes'][$model->id])) ? "fa fa-heart" : "fa fa-heart-o" ?>"> <?php echo $model->likes_count ?></i>
            <i class="fa fa-eye"></i> <?php echo $model->viewed ?>
            <i class="fa fa-comments"></i> <?php echo $model->comments_count ?>
        </span>
    </div>
</div>