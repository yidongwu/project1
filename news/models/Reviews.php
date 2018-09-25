<?php

namespace news\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property string $id
 * @property int $goods_id
 * @property int $type_id 属性类型，如 0：品牌属性，1：其他属性
 * @property string $attr_name 属性名称
 * @property int $is_display 是否显示属性，0：不显示，1：显示
 * @property int $is_delete 是否删除，0：不擅长，1：删除
 * @property string $create_time
 * @property string $update_time
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sys_id', 'client_id', 'goods_news_id', 'agree', 'disagree', 'isdelete', 'isshow', 'date'], 'integer'],
            [['pic_url', 'review'], 'string', 'max' => 255],
            [['review', 'date', 'client_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
        ];
    }

    public function getUserName() {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }
}
