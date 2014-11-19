<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!Yii::$app->user->isGuest): ?>
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
    <?php endif; ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <th>
                ID
            </th>
            <td>
                <?= Html::encode($model->id) ?>
            </td>
        </tr>
        <tr>
            <th>
                Title
            </th>
            <td>
                <?= Html::encode($model->title) ?>
            </td>
        </tr>
        <tr>
            <th>
                Cover
            </th>
            <td>
                <?= Html::img('/uploads/covers/'.$model->cover) ?>
            </td>
        </tr>
        <?php if($model->authors):?>
        <tr>
            <th>
                Author<?=count($model->authors)>1?'s':null?>
            </th>
            <td>
                <?php
                    $authors = $model->authors;
                    end($authors);
                    $lastAuthorKey = key($authors);
                ?>
                <?php foreach($model->authors as $key => $author): ?>
                    <?= Html::a(
                        $author->first_name.' '.$author->second_name,
                        ['author/view', 'id' => $author->id]
                    ).($key != $lastAuthorKey?', ':null) ?>
                <?php endforeach ?>
            </td>
        </tr>
        <?php endif ?>
        <?php if($model->subjects):?>
        <tr>
            <th>
                Subject<?=count($model->subjects)>1?'s':null?>
            </th>
            <td>
                <?php
                    $subjects = $model->subjects;
                    end($subjects);
                    $lastSubjectKey = key($subjects);
                ?>
                <?php foreach($model->subjects as $key => $subject): ?>
                    <?= Html::a(
                        $subject->name,
                        ['subject/view', 'id' => $subject->id]
                    ).($key != $lastSubjectKey?', ':null) ?>
                <?php endforeach ?>
            </td>
        </tr>
        <?php endif ?>
    </table>

</div>
