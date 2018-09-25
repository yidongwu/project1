<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "ad_attrs".
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
class AdAttrs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_attrs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goods_id', 'type_id', 'is_display', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['attr_name', 'create_time', 'update_time'], 'required'],
            [['attr_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'type_id' => 'Type ID',
            'attr_name' => 'Attr Name',
            'is_display' => 'Is Display',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
