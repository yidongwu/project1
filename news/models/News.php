<?php

namespace news\models;

use Yii;

/**
 * This is the model class for collection "news".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $id
 * @property mixed $title
 * @property mixed $content
 * @property mixed $date
 * @property mixed $create_date
 * @property mixed $url
 * @property mixed $source
 * @property mixed $display
 * @property mixed $delete
 */
class News extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['internal', 'news'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'id',
            'title',
            'content',
            'date',
            'create_date',
            'url',
            'source',
            'display',
            'delete',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'content', 'date', 'create_date', 'url', 'source', 'display', 'delete'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'id' => 'Id',
            'title' => 'Title',
            'content' => 'Content',
            'date' => 'Date',
            'create_date' => 'Create Date',
            'url' => 'Url',
            'source' => 'Source',
            'display' => 'Display',
            'delete' => 'Delete',
        ];
    }
}
