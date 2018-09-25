<?php

namespace news\controllers;

use news\models\Reviews;
use Yii;
use news\models\News;
use news\models\NewsSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\mongodb\Query;
use yii\web\Controller;
use common\controllers\CnewsController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends CnewsController
{
    const NAME_LEN = 15;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 新闻首页
     *
     */
    public function actionIndex()
    {
        $this->layout = 'index';
        //1、查询日期最新的一条，且热度最高的
        $today_hot_items = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0])->limit(3)->orderBy("review desc")->asArray()->all();
        //2、查询各个栏目当天最新，且热度最高的一条
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 1])->orderBy("review desc")->asArray()->one();
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 2])->orderBy("review desc")->asArray()->one();
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 3])->orderBy("review desc")->asArray()->one();
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 4])->orderBy("review desc")->asArray()->one();
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 5])->orderBy("review desc")->asArray()->one();
        $today_hot_per_type_items[] = News::find()->select(['id', 'title', 'type', 'review'])->where(['delete' => 0, 'type' => 6])->orderBy("review desc")->asArray()->one();
        //3、将1和2的内容整合到一个数组
        $news_list_hot['top'] =  $today_hot_items;
        $news_list_hot['items'] =  $today_hot_per_type_items;

        return $this->render('index', [
            'news_lists' => $news_list_hot,
        ]);
    }

    /*
     * 新闻详情
     */
    public function actionView()
    {
        $this->layout = 'index';
        $request_params = Yii::$app->request->get();
        $file_path = Yii::getAlias('@moban').'/views/news/';

        if(trim($request_params['name']) && (strlen($request_params['name']) == self::NAME_LEN)) { //判断文章名称长度
            if(file_exists($file_path . $request_params['name'] . '.html')) {  //判断新闻是否生成静态文件
                $news_static_html = file_get_contents($file_path . $request_params['name'] . '.html');
            } else {
                $query = new Query();
                $row = $query->select(['title','content','type'])
                    ->from(News::collectionName())
                    ->where(['id' => (int)$request_params['id'], 'delete' => 0, 'display' => 1,'type' => (int)$request_params['type']])->one();
                if(!empty($row)) {
                    if(substr(md5($row['title']),0,15) != $request_params['name']) {
                        return 404;
                    }
                    $moban_path = Yii::getAlias('@moban') . '/views/moban/';
                    $moban_file = 'detail.html';
                    $moban_html = file_get_contents($moban_path . $moban_file);

                    $review_url = Html::a('查看评论',['review/index','id' => (int)$request_params['id']]);
                    $news_static_html =  str_replace(array('<!--title-->', '<!--content-->', '<!--check_review-->'),array($row['title'], $row['content'], $review_url), $moban_html);
                    file_put_contents($file_path . substr(md5($row['title']),0,15) . '.html',$news_static_html);
                }
            }

            $model = new Reviews(); //评论的表单
            return $this->render('view', [
                'model' => $model,
                'news_static_html' => $news_static_html,
            ]);
        } else {
            return 403;
        }
    }
}
