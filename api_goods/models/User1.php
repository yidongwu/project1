<?php

namespace api_cart\models;

use Yii;

/**
 * This is the model class for table "user1".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $status
 */
class User1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['status'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }
}
