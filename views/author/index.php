<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
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
            <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success col-sm-12']) ?>
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
                First name
            </th>
            <th>
                Second name
            </th>
            <th>
                Books
            </th>
            <th>
            </th>
        </tr>
        </thead>
        <?php foreach ($dataProvider->models as $author): ?>
        <?php /** @var \app\models\Author $author */ ?>
        <tr>
            <td class="col-sm-1"><?=Html::encode($author->id)?></td>
            <td><?=Html::a(
                    Html::encode($author->first_name),
                    ['author/view','id'=>$author->id]
                    )?></td>
            <td><?=Html::a(
                    Html::encode($author->second_name),
                    ['author/view','id'=>$author->id]
                    )?></td>
            <td class="col-sm-1"><?=Html::encode(count($author->books))?></td>
            <td class="col-sm-2">
                <?= Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $author->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete', 'id' => $author->id], [
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
