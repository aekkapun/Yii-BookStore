<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-search row">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-sm-3">
    <?= $form->field($model, 'id') ?>
    </div>
    <div class="col-sm-3">
    <?= $form->field($model, 'first_name') ?>
    </div>
    <div class="col-sm-3">
    <?= $form->field($model, 'second_name') ?>
    </div>
    <div class="form-group col-sm-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary col-sm-5']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default col-sm-5 col-sm-offset-1']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
