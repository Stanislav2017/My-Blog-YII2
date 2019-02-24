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
    <?php if (!empty($models)) : ?>
        <?php foreach ($models as $model) : ?>
            <div class="card mb-4">
                <?php echo Html::img($model->image_path, ['class' => 'card-img-top', 'alt' => 'Card image cap', 'height' => 300, 'width' => 750]); ?>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $model->title ?></h2>
                    <p class="card-text"><?php echo $model->content ?></p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $model->date ?>
                    Posted on January 1, 2017 by
                    <a href="#">My Blog</a>
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