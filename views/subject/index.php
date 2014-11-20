<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-<?=Yii::$app->user->isGuest?12:10?>">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <?php if(!Yii::$app->user->isGuest): ?>
            <div class="col-sm-2 text-right">
                <?= Html::a('Create Subject', ['create'], ['class' => 'btn btn-success col-sm-12']) ?>
            </div>
        <?php endif ?>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Books
            </th>
            <th>

            </th>
        </tr>
        </thead>
        <?php foreach ($dataProvider->models as $subject): ?>
            <?php /** @var \app\models\Subject $subject */ ?>
            <tr>
                <td class="col-sm-1"><?=Html::encode($subject->id)?></td>
                <td><?=Html::a(
                        Html::encode($subject->name),
                        ['subject/view','id'=>$subject->id]
                    )?></td>
                <td class="col-sm-1"><?=Html::encode(count($subject->books))?></td>
                <td class="col-sm-2">
                    <?= Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $subject->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete', 'id' => $subject->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="row text-center">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,

        ]); ?>
    </div>
</div>
