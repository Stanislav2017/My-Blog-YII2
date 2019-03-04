<?php use yii\helpers\Url; ?>

<?php if (!empty($categories)) : ?>
    <?php foreach ($categories as $key => $category) : ?>
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
    <h5>Categories not found!!!</h5>
<?php endif;?>