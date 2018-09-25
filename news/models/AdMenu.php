<?php

namespace news\models;

use Yii;

/**
 * This is the model class for table "ad_menu".
 *
 * @property string $id 自增id
 * @property string $type 菜单类型.0后台,1前台
 * @property string $parent_id 上级菜单id
 * @property string $name 名称
 * @property string $url url地址
 * @property string $icon 图标
 * @property double $sort 排序
 * @property int $is_display 是否显示.0否,1是
 * @property string $created_at 创建时间
 * @property string $updated_at 最后修改时间
 */
class AdMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'parent_id', 'is_display', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'created_at'], 'required'],
            [['sort'], 'number'],
            [['name', 'url', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'url' => 'Url',
            'icon' => 'Icon',
            'sort' => 'Sort',
            'is_display' => 'Is Display',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
