<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif ?>
    <table class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td><?=Html::encode($model->id)?></td></tr>
        <tr><th>Name</th><td><?= Yii::$app->user->isGuest?Html::encode($model->name):
                \mcms\xeditable\XEditableText::widget([
                    'model' => $model,
                    'placement' => 'right',
                    'pluginOptions' => [
                        'name' => 'name',
                    ],
                    'callbacks' => [
                        'validate' => new \yii\web\JsExpression('
                            function(value) {
                                if($.trim(value) == "") {
                                    return "This field is required";
                                }
                            }
                        ')
                    ]
                ]); ?></td></tr>
    </table>
    <h2>Related books</h2>
    <?php echo $this->render('../book/_list', ['dataProvider' => $dataProvider]); ?>


</div>
