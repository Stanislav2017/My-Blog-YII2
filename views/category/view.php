<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<!-- Blog Entries Column -->
<div class="col-md-12">
    <h2 class="<?php echo isset($this->title) ? 'my-4' : 'my-4 text-success' ?>">
        <?php echo isset($this->title) ? $this->title : 'Article in this category not found!!!' ?>
    </h2>
    <!-- Blog Post -->
    <?php if (!empty($models)) : ?>
        <?php foreach ($models as $model) : ?>
            <div class="card mb-4">
                <?php echo Html::img($model->image_path, ['class' => 'card-img-top', 'alt' => 'Card image cap', 'height' => 300, 'width' => 750]); ?>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $model->title ?></h2>
                    <p class="card-text"><?php echo $model->content ?></p>
                    <?php echo Html::a('Read More  &rarr;', ['site/view', 'alias' => $model->alias], ['class' => 'btn btn-secondary']) ?>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?php echo date('M d, Y', strtotime($model->date)); ?>
                    <!--Posted on January 1, 2017-->
                    by <a href="#"><?php echo $model->user->username ?></a>
                    <span class="float-right">
                        <i id="like"
                           data-id="<?php echo $model->id ?>"
                           class="<?php echo (isset($_SESSION['article']['likes'][$model->id]) && in_array(Yii::$app->user->id, $_SESSION['article']['likes'][$model->id])) ? "fa fa-heart" : "fa fa-heart-o" ?>"> <?php echo $model->likes_count ?></i>

                        <i class="fa fa-eye" ></i> <?php echo $model->viewed ?>
                        <i class="fa fa-comments"></i> <?php echo $model->comments_count ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2 class="my-4 text-warning">Articles not found !!!</h2>
    <?php endif; ?>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </ul>

</div>