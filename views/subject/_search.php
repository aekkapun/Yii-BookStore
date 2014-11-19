<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-4 form-group">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="form-group col-sm-4">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
