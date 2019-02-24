<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-8">
    <h3 class="my-4">Sign In</h3>
    <div class="card mb-4">
        <div class="card-body">
            <?php $form = ActiveForm::begin(['id' => 'form-signin']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <!--  --><?/*= $form->field($model, 'avatar')->fileInput() */?>
            <div class="form-group">
                <?= Html::submitButton('Sign Up', ['class' => 'btn pull-right btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>