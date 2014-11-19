<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Author */

$this->title = $model->first_name .' '.$model->second_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">

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
        <tr><th>First name</th><td><?= Yii::$app->user->isGuest?Html::encode($model->first_name):
                    \mcms\xeditable\XEditableText::widget([
                        'model' => $model,
                        'placement' => 'right',
                        'pluginOptions' => [
                            'name' => 'first_name',
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
        <tr><th>Second name</th><td><?= Yii::$app->user->isGuest?Html::encode($model->second_name):
                    \mcms\xeditable\XEditableText::widget([
                        'model' => $model,
                        'placement' => 'right',
                        'pluginOptions' => [
                            'name' => 'second_name',
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
    <h2>Author's books</h2>
    <?php echo $this->render('../book/_list', ['dataProvider' => $dataProvider]); ?>

</div>
