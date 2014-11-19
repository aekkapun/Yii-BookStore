<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Book[] $books
 */
class Subject extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('subject2book', ['subject_id' => 'id']);
    }
    /**
     * @return array
     */
    public static function getSubjectsMap()
    {
        $subjects = Subject::find()->all();
        $subjectsMap = [];
        foreach ($subjects as $subject) {
            $subjectsMap[$subject->id] = $subject->name;
        }
        return $subjectsMap;
    }
}
