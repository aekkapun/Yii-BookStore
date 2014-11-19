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
        <?php foreach ($dataProvider->models as $key=>$book): ?>
            <?php /** @var \app\models\Book $book */ $booksInRow = 6 ?>
            <?= ($key+1)%$booksInRow == 1?'<div class="row" style="margin: 2em 0">':null ?>
            <div class="col-sm-<?=12/$booksInRow?> text-center">
                <?= Html::a(EasyThumbnailImage::thumbnailImg(
                    Yii::$app->basePath.'/web/uploads/covers/'.$book->cover,
                    150,
                    200,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    ['alt' => $book->title,
                     'class'=>'img-rounded']
                ), '/book/view&id='.$book->id) ?>
                <br>
                <?= Html::a($book->title, '/book/view&id='.$book->id) ?>
            </div>
            <?= ($key+1)%$booksInRow == 0?'</div>':null ?>
        <?php endforeach ?>
        <?= ($dataProvider->count)%$booksInRow != 0?'</div>':null ?>
        <div class="row text-center">
        <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        ]); ?>
        </div>
    <?php else: ?>
        <div class="row">
            <h1>Nothing found :(</h1>
        </div>
    <?php endif ?>
</div>
