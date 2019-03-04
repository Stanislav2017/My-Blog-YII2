<?php

/* @var $this yii\web\View */
/* @var $comment app\models\Comment */

use app\components\BootstrapLinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<!-- Blog Entries Column -->
<div class="col-md-12">
    <h2 class="<?php echo isset($this->title) ? 'my-4' : 'my-4 text-success' ?>">
        <?php echo isset($this->title) ? $this->title : 'Article in this category not found!!!' ?>
    </h2>
    <!-- Blog Post -->
    <?php echo Yii::$app->view->renderFile('@app/views/post.php', ['model' => $model]) ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <!-- Blog Post -->
        <div class="card mb-4">
            <div class="card-body">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => false]]) ?>
                <div class="col-sm-12">
                    <?php echo $form->field($comment, 'text', [
                        'options' => ['class' => 'form-group', 'id' => false]
                    ])->textarea(['id' => false, 'rows' => 5, 'class' => 'form-control', 'placeholder' => 'Message....'])
                        ->label(false) ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo Html::button('Send', [
                            'class' => 'btn btn-secondary float-right',
                            'type' => 'submit'
                        ]) ?>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    <?php else: ?>
        <h2 class="my-4 text-center">
            Log in, to leave a comment...
        </h2>
    <?php endif; ?>
</div>
<div class="col-md-12">
    <?php if (!empty($comments)) : ?>
        <?php foreach ($comments as $key => $comment) : ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                        <p class="text-secondary text-center"><?php echo $comment['user']['username'] ?></p>
                    </div>
                    <div class="col-md-10">
                        <div class="clearfix"></div>
                        <p><?php echo $comment['text'] ?></p>
                    </div>
                </div>
                <p class="float-right text-secondary text-center">
                    <?php echo Yii::$app->formatter->format($comment['created_at'], 'relativeTime') ?>
                </p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php echo BootstrapLinkPager::widget([
        'pagination' => $pages
    ]); ?>

</div>