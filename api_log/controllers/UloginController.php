<?php
namespace api_log\controllers;

use api_cart\models\AdCart;
use api_cart\models\AdGoods;
use common\models\AddressBook;
use common\models\ApiUser;
use common\models\User;
use common\models\UserBehavior;
use Yii;
use common\controllers\ApicomController;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use common\models\LoginForm;

/**
 * Site controller
 */
class UloginController extends ApicomController
{
	public $enableCsrfValidation = false;
	public $_reids = '';
	const VIEWS_MORE = 2;
	const VIEWS_MORE_ONE = 1;

	public function init()
	{
		parent::init(); // TODO: Change the autogenerated stub
		$this->_reids = Yii::$app->request->get();
	}

	/*
	 * $post = Array
			(
					[login_ip] => 27.38.28.238
    				[login_time] => 1537332126
    				[login_sys] => 1
		);
	 */
	public function actionPostLog() {
		$post = file_get_contents("php://input");
		if(!empty($post)) {
			$post = json_decode($post, true);
			$log_post['user_id'] = Yii::$app->user->id;
			$log_post['data'] = $post;

			//用户登录记录生产者
			$route_key = Yii::$app->params['log_login_message_route_key'];
			$this->_productor($log_post, $route_key);
			return json_encode(['100', 'success']);
		}
	}

	/*
	 * 获取用户浏览过的商品
	 */
	public function actionViewsLog() {
		$count = UserBehavior::find()
				->where(['uid' => Yii::$app->user->id, 'is_show' => 1, 'is_delete' => 0])
				->groupBy('goods_id')
				->count();
		return json_encode($count);
	}

	/*
	 * 获取用户的所有度鞥了记录
	 */
	public function actionViewsMost() {
		$detail = Yii::$app->request->get('detail');
		$detail ? $query_str = 'goods_id, type_id, count(*) sum_count, sum(LOBT) brows_time' : $query_str = 'goods_id, count(*) sum_count, sum(LOBT) brows_time';
		$views_more = (new \yii\db\Query())
				->select($query_str)
				->from('user_behavior_log')
				->where(['uid'=>Yii::$app->user->id])
				->groupBy('goods_id')
				->orderBy(['sum_count' => SORT_DESC, 'brows_time' => SORT_DESC])  //按照浏览次数和浏览总时长来排序，如果浏览次数都一样则按照浏览时长排序
				->limit(self::VIEWS_MORE);
		if($detail) { //获取详情
			$data['data'] = $views_more->all();
		} else { //只获取具体数量
			$data['data'] = $views_more->count();
		}
		return json_encode($data);
	}

	private function _productor($data, $routing_key = '') {
		$host = Yii::$app->params['route_rabbit'];
		$port = Yii::$app->params['port'];
		$user = Yii::$app->params['user'];
		$password = Yii::$app->params['pwd'];
		$vhost = Yii::$app->params['vhost'];
		$exchange_name = Yii::$app->params['log_login_message_exchange_name'];
		$exchange_type = Yii::$app->params['log_login_message_exchange_type'];
		$exchange_durable = true;
		//1 创建连接
		$conn = new AMQPStreamConnection($host,$port,$user,$password,$vhost);
		//2 创建channel，即获取信道
		$channel = $conn->channel();
		//3 声明交换器
		$channel->exchange_declare($exchange_name,$exchange_type,false,$exchange_durable);
		//4 创建消息
		$msg = new AMQPMessage(json_encode($data),array('delivery_mode'=>AMQPMessage::DELIVERY_MODE_PERSISTENT)); //AMQPMessage::DELIVERY_MODE_PERSISTENT 设置消息持久化
		//5 发布消息
		$channel->basic_publish($msg,$exchange_name,$routing_key);
		//$channel->close();
		//$conn->close();
	}
}























