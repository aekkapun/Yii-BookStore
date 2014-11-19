<?php

namespace app\controllers;

use app\models\Author2Book;
use app\models\Subject2Book;
use Yii;
use app\models\Book;
use app\models\BookSearch;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $pagination = new Pagination();
        $pagination->pageSize = 18;
        $dataProvider->setPagination($pagination);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();
        $model->scenario = 'insert';
        if ($model->load(Yii::$app->request->post())) {
            $authorsIDs  = @Yii::$app->request->post()["author_id"];
            $subjectsIDs = @Yii::$app->request->post()["subject_id"];
            $model->cover = UploadedFile::getInstance($model, 'cover');
            if ($model->validate()) {
                $coverPath = str_replace('\\', DIRECTORY_SEPARATOR,
                    dirname(__DIR__).'\web\uploads\covers\\');
                $coverName = hash('crc32',$model->cover->baseName).'.'.$model->cover->extension;
                $model->cover->saveAs($coverPath.$coverName);
                $model->cover = $coverName;
                $model->save();
                if ($authorsIDs) {
                    foreach ($authorsIDs as $authorID) {
                        $author2book = new Author2Book();
                        $author2book->author_id = $authorID;
                        $author2book->book_id = $model->id;
                        $author2book->save();
                    }
                }
                if ($subjectsIDs) {
                    foreach ($subjectsIDs as $subjectID) {
                        $subject2book = new Subject2Book();
                        $subject2book->subject_id = $subjectID;
                        $subject2book->book_id = $model->id;
                        $subject2book->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $oldCover = $model->cover;
        if ($model->load(Yii::$app->request->post())) {
            $authorsIDs  = @Yii::$app->request->post()["author_id"];
            $subjectsIDs = @Yii::$app->request->post()["subject_id"];
            if ($model->validate()) {
                if ($model->cover = UploadedFile::getInstance($model, 'cover')) {
                    $coverPath = str_replace('\\', DIRECTORY_SEPARATOR,
                        dirname(__DIR__) . '\web\uploads\covers\\');
                    $coverName = hash('crc32', $model->cover->baseName) . '.' . $model->cover->extension;
                    $model->cover->saveAs($coverPath . $coverName);
                    $model->cover = $coverName;
                } else {
                    $model->cover = $oldCover;
                }
                $model->save();
                Author2Book::deleteAll(['book_id' => $model->id]);
                if ($authorsIDs) {
                    foreach ($authorsIDs as $authorID) {
                        $author2book = new Author2Book();
                        $author2book->author_id = $authorID;
                        $author2book->book_id = $model->id;
                        $author2book->save();
                    }
                }
                Subject2Book::deleteAll(['book_id' => $model->id]);
                if ($subjectsIDs) {
                    foreach ($subjectsIDs as $subjectID) {
                        $subject2book = new Subject2Book();
                        $subject2book->subject_id = $subjectID;
                        $subject2book->book_id = $model->id;
                        $subject2book->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Subject2Book::deleteAll(['book_id' => $id]);
        Author2Book::deleteAll(['book_id' => $id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
