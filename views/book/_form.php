<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Author;
use app\models\Subject;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 120]) ?>
    <?= $form->field($model, 'cover')->fileInput(['accept' => 'image/jpeg,image/png,image/gif']) ?>
    <?php $authorIDs  = [] ?>
    <?php $subjectIDs = [] ?>
    <?php foreach($model->authors as $author): ?>
        <?php $authorIDs[] = $author->id ?>
    <?php endforeach; ?>
    <?php foreach($model->subjects as $subject): ?>
        <?php $subjectIDs[] = $subject->id ?>
    <?php endforeach; ?>
    <label for="authors_id">Authors</label>
    <select class="form-control" name="author_id[]" id="authors_id" multiple size="7">
        <?php foreach(Author::getAuthorsMap() as $id=>$name): ?>
            <option value="<?=$id?>" <?=in_array($id,$authorIDs)?'selected':null?>><?=Html::encode($name)?></option>
        <?php endforeach ?>
    </select><br>
    <label for="subject_id">Subjects</label>
    <select class="form-control" name="subject_id[]" id="subject_id" multiple size="7">
        <?php foreach(Subject::getSubjectsMap() as $id=>$name): ?>
            <option value="<?=$id?>" <?=in_array($id,$subjectIDs)?'selected':null?>><?=Html::encode($name)?></option>
        <?php endforeach ?>
    </select><br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
