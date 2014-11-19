<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-search row">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-sm-11">
        <?= Html::input('text', 'SubjectSearch[name]', $model->name,
            ['class' => 'form-control', 'placeholder' => $model->attributeLabels()['name']]) ?>
    </div>
    <div class="col-sm-1">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
