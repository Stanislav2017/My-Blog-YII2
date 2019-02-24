<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\BlogAsset;
use yii\helpers\Html;
use yii\helpers\Url;

BlogAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="<?php echo (Url::current() == Url::toRoute(['site/index'])) ? 'nav-item active' : 'nav-item' ?>">
                    <a class="nav-link" href="<?php echo Url::home() ?>">
                        Home
                        <?php echo (Url::current() == Url::home()) ? "<span class=\"sr-only\">(current)</span>" : '' ?>
                    </a>
                </li>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <li class="<?php echo (Url::current() == Url::toRoute(['site/sign-in'])) ? 'nav-item active' : 'nav-item'?>">
                        <a class="nav-link" href="<?php echo Url::toRoute(['site/sign-in']) ?>">
                            Sign In
                            <?php echo (Url::current() == Url::toRoute(['site/sign-in'])) ? "<span class=\"sr-only\">(current)</span>" : '' ?>
                        </a>
                    </li>
                    <li class="<?php echo (Url::current() == Url::toRoute(['site/sign-up'])) ? 'nav-item active' : 'nav-item'?>">
                        <a class="nav-link" href="<?php echo Url::toRoute(['site/sign-up']) ?>">
                            Sign Up
                            <?php echo (Url::current() == Url::toRoute(['site/sign-up'])) ? "<span class=\"sr-only\">(current)</span>" : '' ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <?= Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post'], 'class' => 'nav-link']) ?>
                       <!-- <a class="nav-link" href="<?php /*echo Url::toRoute(['site/logout'])  */?>">Logout</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Hi, <?php echo strtoupper(Yii::$app->user->identity->username) ?>...</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?= $content ?>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input id="search" type="text" name="search" class="form-control" placeholder="Search for..." required>
                        <span class="input-group-btn">
                            <button id="search-button" class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
<!--                        --><?php //echo '<pre>' . print_r($this->params['category'], true) . '</pre>' ?>
                        <?php if (isset($this->params['category']) && !empty($this->params['category'])) : ?>
                            <?php foreach ($this->params['category'] as $key => $category) : ?>
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <?php foreach ($category as $inner_category) : ?>
                                                <li>
                                                    <a href="<?php echo Url::toRoute(['category/view', 'alias' => $inner_category['alias']]) ?>">
                                                        <?php echo $inner_category['title'] ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                            <?php endforeach ;?>
                        <?php else:?>
                            <h3>Article not found!!!</h3>
                        <?php endif;?>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

