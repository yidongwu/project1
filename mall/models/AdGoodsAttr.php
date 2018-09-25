<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "ad_goods_attr".
 *
 * @property string $id
 * @property string $attr_id 关联属性表的id
 * @property string $goods_id 关联到goods表的id
 * @property string $attr_value 属性值
 * @property int $is_display 是否显示，1显示，0不显示
 * @property int $is_delete 是否删除，0删除，1删除
 * @property string $create_time
 * @property string $update_time
 */
class AdGoodsAttr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_goods_attr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attr_id', 'goods_id', 'attr_value', 'create_time', 'update_time'], 'required'],
            [['attr_id', 'goods_id', 'is_display', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['attr_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attr_id' => 'Attr ID',
            'goods_id' => 'Goods ID',
            'attr_value' => 'Attr Value',
            'is_display' => 'Is Display',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getAdAttrs() {
        return $this->hasOne(AdAttrs::className(),['id' => 'attr_id']);
    }

    public function getAdGoods() {
        return $this->hasOne(AdGoods::className(),['id' => 'goods_id']);
    }
}
