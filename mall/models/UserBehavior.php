<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "user_behavior_log".
 *
 * @property int $id
 * @property string $uid 关联user表的id
 * @property int $goods_id 浏览的商品id
 * @property int $type_id 浏览的商品类型
 * @property int $browse_count 浏览次数
 * @property int $LOBT length of browse time浏览时长，单位秒(s)
 * @property int $is_delete 是否删除，0否，1是
 * @property int $is_show 是否显示，0否，1是
 * @property int $create_time
 */
class UserBehavior extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_behavior_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goods_id', 'type_id', 'browse_count', 'LOBT', 'is_delete', 'is_show', 'create_time', 'uid'], 'integer'],
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
            'goods_id' => 'Goods ID',
            'type_id' => 'Type ID',
            'browse_count' => 'Browse Count',
            'LOBT' => 'Lobt',
            'is_delete' => 'Is Delete',
            'is_show' => 'Is Show',
            'create_time' => 'Create Time',
        ];
    }
}
