<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $cover
 *
 * @property Author[] $authors
 * @property Subject[] $subjects
 */
class Book extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cover'],
                'required',
                'on'=>'insert'
            ],
            [['title'],
                'required',
                'on'=>'update'
            ],
            [['title'], 'string', 'max' => 120],
            ['cover','file',
                'extensions' => 'jpg, png',
                'mimeTypes' => 'image/jpeg, image/png', //TODO install the fileinfo PHP extension
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cover' => 'Cover',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('author2book', ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['id' => 'subject_id'])->viaTable('subject2book', ['book_id' => 'id']);
    }
}
