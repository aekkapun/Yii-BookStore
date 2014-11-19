<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Yii-BookStore',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);?>
        <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Books', 'url' => ['book/index']],
                    ['label' => 'Authors', 'url' => ['author/index']],
                    ['label' => 'Subjects', 'url' => ['subject/index']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Ilia Marchenko &lt;<a href="mailto:il-marc@ya.ru">il-marc@ya.ru</a>&gt; 2014</p>
            <p class="pull-right">Powered by <a href="http://www.yiiframework.com/" target="_blank" rel="external">Yii Framework</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>

<script>
    function setBlur(element, blurSize) {
        $(element).
        css('-webkit-filter', 'blur('+ blurSize +'px)').
           css('-moz-filter', 'blur('+ blurSize +'px)').
             css('-o-filter', 'blur('+ blurSize +'px)').
            css('-ms-filter', 'blur('+ blurSize +'px)').
                css('filter', 'blur('+ blurSize +'px)')
    }
    $(document).ready(function () {
        if ($(".bookcase").length) {
            setBlur($(".bookcase").css('height', window.innerHeight), window.innerHeight / 200);
            $(window).resize(function () {
                setBlur($(".bookcase").css('height', window.innerHeight), window.innerHeight / 200);
            });
        }
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
