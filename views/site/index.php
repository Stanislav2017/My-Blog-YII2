<?php

/* @var $this yii\web\View */
/* @var $search string */
/* @var $pages Pagination */

use app\components\BootstrapLinkPager;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Blog Entries Column -->
<div class="col-md-12">
    <h2 class="my-4">Popular article</h2>
    <!-- Blog Post -->
    <?php if (!empty($models)) : ?>
        <?php $view = Yii::$app->view ?>
        <?php foreach ($models as $model) : ?>
            <?php echo $view->renderFile('@app/views/post.php', ['model' => $model]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <?php if ($search) : ?>
            <h3 class="text-warning"><?php echo "Article where search \"{$search}\" not found !!!" ?></h3>
        <?php else: ?>
            <h3>Article not found!!!</h3>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Pagination -->
    <!--<ul class="pagination justify-content-center mb-4">-->
        <?php echo BootstrapLinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    <!--</ul>-->

</div>