<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<!-- Blog Entries Column -->
<div class="col-md-8">
    <h2 class="<?php echo isset($this->title) ? 'my-4' : 'my-4 text-success' ?>">
        <?php echo isset($this->title) ? $this->title : 'Article in this category not found!!!' ?>
    </h2>
    <!-- Blog Post -->
    <div class="card mb-4">
        <?php echo Html::img($model->image_path, ['class' => 'card-img-top', 'alt' => 'Card image cap', 'height' => 300, 'width' => 750]); ?>
        <div class="card-body">
            <h2 class="card-title"><?php echo $model->title ?></h2>
            <p class="card-text"><?php echo $model->content ?></p>
        </div>
        <div class="card-footer text-muted">
            Posted on <?php echo date('M d, Y', strtotime($model->date)); ?>
            <!--Posted on January 1, 2017-->
            by <a href="#"><?php echo $model->user->username ?></a>
            <span class="float-right">
                        <i id="like"
                           data-id="<?php echo $model->id ?>"
                           class="<?php echo (isset($_SESSION['article']['likes'][$model->id]) && in_array(Yii::$app->user->id, $_SESSION['article']['likes'][$model->id])) ? "fa fa-heart" : "fa fa-heart-o" ?>"> <?php echo $model->like ?></i>

                        <i class="fa fa-eye" ></i> <?php echo $model->viewed ?>
                <i class="fa fa-comments"></i> <?php echo $model->getCommentsCount() ?>
                    </span>
        </div>
    </div>
</div>