<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author2book".
 *
 * @property integer $author_id
 * @property integer $book_id
 *
 * @property Author $author
 * @property Book $book
 */
class Author2Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author2book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'book_id'], 'required'],
            [['author_id', 'book_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Author ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
