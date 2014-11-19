<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?php $books = $dataProvider->models ?>
<?php /** @var \app\models\Book $book */ $booksInRow = 6 ?>
<?php foreach ($books as $key=>$book): ?>
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
<?= (count($books))%$booksInRow != 0?'</div>':null ?>
<div class="row text-center">
    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,

    ]); ?>
</div>