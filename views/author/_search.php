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
    <div class="col-sm-4">
        <?= Html::input('text', 'AuthorSearch[first_name]', $model->first_name,
            ['class' => 'form-control', 'placeholder' => $model->attributeLabels()['first_name']]) ?>
    </div>
    <div class="col-sm-5">
        <?= Html::input('text', 'AuthorSearch[second_name]', $model->second_name,
            ['class' => 'form-control', 'placeholder' => $model->attributeLabels()['second_name']]) ?>
    </div>
    <div class="col-sm-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary col-sm-5']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
