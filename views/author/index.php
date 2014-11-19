<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-<?=Yii::$app->user->isGuest?12:10?>">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <?php if(!Yii::$app->user->isGuest): ?>
        <div class="col-sm-2 text-right">
            <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <?php endif ?>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            /** @var \app\models\Author $model */
            return Html::a(Html::encode(
                    $model->first_name .' '.
                    $model->second_name.
                    ' ('.count($model->books)).')',
                ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>
