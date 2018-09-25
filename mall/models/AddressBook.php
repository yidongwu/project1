<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "ad_address_book".
 *
 * @property int $id
 * @property string $uid 关联user表的id
 * @property string $nick_name 用户昵称
 * @property int $sex
 * @property string $birthday
 * @property string $company_name 公司名称
 * @property string $address 邮寄地址
 * @property int $status 该条记录的状态，1可用，0删除
 * @property int $createTime
 * @property int $updateTime
 */
class AddressBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_address_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'status', 'birthday', 'createTime', 'updateTime', 'uid'], 'integer'],
            [['nick_name'], 'string', 'max' => 100],
            [['company_name', 'address'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'nick_name' => 'Nick Name',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'company_name' => 'Company Name',
            'address' => 'Address',
            'status' => 'Status',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
        ];
    }
}
