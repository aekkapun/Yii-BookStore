<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-<?=Yii::$app->user->isGuest?12:10?>">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <?php if(!Yii::$app->user->isGuest): ?>
            <div class="col-sm-2 text-right">
                <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        <?php endif ?>
    </div>
    <?php if($dataProvider->totalCount): ?>
        <div class="row" style="margin: 2em 0">
            <p>Found <?=$dataProvider->totalCount?> <?=$dataProvider->totalCount==1?'book':'books'?>.</p>
        </div>
        <?php echo $this->render('_list', ['dataProvider' => $dataProvider]); ?>
    <?php else: ?>
        <div class="row">
            <h1>Nothing found :(</h1>
        </div>
    <?php endif ?>
</div>
