<?php

namespace mall\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $CustomersID
 * @property string $CustomersNo ä¼šå‘˜ç¼–å·ä»¥1000å¼€å§‹
 * @property string $Email ç”µé‚®(ç™»å½•è´¦å·)
 * @property string $Mobile æ‰‹æœº(ç™»å½•è´¦å·)
 * @property string $Passwords ç™»å½•å¯†ç 
 * @property string $PaymentPasswrods
 * @property int $VipClassID vipåˆ†ç±»id
 * @property string $VipLevelID
 * @property string $Name çœŸå®žå§“å
 * @property string $NickName æ˜µç§°
 * @property string $HeadImgUrl
 * @property int $Sex
 * @property string $ICCardClass è¯ä»¶ç±»åž‹-åœ¨sys_statusé‡Œè®¾ç½®
 * @property string $ICCard è¯ä»¶å¡å·
 * @property string $Birthday ç”Ÿæ—¥
 * @property string $Phone è”ç³»ç”µè¯
 * @property string $CorpName å…¬å¸åå­—
 * @property string $Address è”ç³»åœ°å€
 * @property int $LevelPoints ç­‰çº§ç§¯åˆ†
 * @property int $BonusPoins æ¶ˆè´¹ç§¯åˆ†
 * @property int $LovePoints æ…ˆå–„ç§¯åˆ†
 * @property string $Amount ä¼šå‘˜å¡é‡‘é¢
 * @property int $Status 0:æœªå®¡æ ¸1:æ­£å¸¸2:é”å®š
 * @property int $LoginCount ç™»å½•æ¬¡æ•°
 * @property string $RegIP
 * @property string $Belong å±žäºŽå“ªé‡Œæ³¨å†Œpc/mb/wechat/android/ios/hotel
 * @property string $CreateTime æ³¨å†Œæ—¶é—´
 * @property string $UpdateTime èµ„æ–™æ›´æ–°æ—¶é—´
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VipClassID', 'Sex', 'LevelPoints', 'BonusPoins', 'LovePoints', 'Status', 'LoginCount'], 'integer'],
            [['Birthday', 'CreateTime', 'UpdateTime'], 'safe'],
            [['Amount'], 'number'],
            [['CustomersNo', 'Email', 'Passwords', 'PaymentPasswrods'], 'string', 'max' => 200],
            [['Mobile', 'VipLevelID', 'ICCard'], 'string', 'max' => 50],
            [['Name', 'NickName'], 'string', 'max' => 100],
            [['HeadImgUrl', 'CorpName', 'Address'], 'string', 'max' => 1000],
            [['ICCardClass', 'RegIP', 'Belong'], 'string', 'max' => 20],
            [['Phone'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CustomersID' => 'Customers ID',
            'CustomersNo' => 'Customers No',
            'Email' => 'Email',
            'Mobile' => 'Mobile',
            'Passwords' => 'Passwords',
            'PaymentPasswrods' => 'Payment Passwrods',
            'VipClassID' => 'Vip Class ID',
            'VipLevelID' => 'Vip Level ID',
            'Name' => 'Name',
            'NickName' => 'Nick Name',
            'HeadImgUrl' => 'Head Img Url',
            'Sex' => 'Sex',
            'ICCardClass' => 'Iccard Class',
            'ICCard' => 'Iccard',
            'Birthday' => 'Birthday',
            'Phone' => 'Phone',
            'CorpName' => 'Corp Name',
            'Address' => 'Address',
            'LevelPoints' => 'Level Points',
            'BonusPoins' => 'Bonus Poins',
            'LovePoints' => 'Love Points',
            'Amount' => 'Amount',
            'Status' => 'Status',
            'LoginCount' => 'Login Count',
            'RegIP' => 'Reg Ip',
            'Belong' => 'Belong',
            'CreateTime' => 'Create Time',
            'UpdateTime' => 'Update Time',
        ];
    }
}
