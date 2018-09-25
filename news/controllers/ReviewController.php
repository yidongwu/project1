<?php

namespace news\controllers;

use common\models\User;
use Yii;
use common\controllers\CnewsController;
use yii\mongodb\Query;
use news\models\News;
use news\models\NewsSearch;
use news\models\Reviews;
use yii\filters\VerbFilter;

class ReviewController extends CnewsController
{
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

    /*
     * 评论列表页
     */
    public function actionIndex()
    {
        $this->layout = 'index';
        $news_id = Yii::$app->request->get('id');
        $reviews_list = Reviews::find()->select(['id', 'sys_id', 'client_id', 'goods_news_id', 'date', 'review', 'agree', 'disagree'])->where(['goods_news_id' => $news_id, 'isdelete' => 0, 'isshow' => 1])->all();
        $news_title = News::find()->select(['title'])->where(['delete' => 0, 'id' => (int)$news_id])->one();
        return $this->render('index', [
            'news_title' => $news_title,
            'reviews_list' => $reviews_list,
        ]);
    }

    /*
     * 赞
     */
    public function actionAgree() {
        $request_data = Yii::$app->request->get();
        $model = Reviews::find()->where(['id' => $request_data['id'], 'goods_news_id' => $request_data['news_id']])->one();
        $model->agree +=1;
        if(!$model->update()) {
            echo "<pre>";
            print_r($model->errors);
            exit;
        }
        return $this->redirect(Yii::$app->request->getReferrer());
    }

    /*
     * 踩
     */
    public function actionDisagree() {
        $request_data = Yii::$app->request->get();
        $model = Reviews::find()->where(['id' => $request_data['id'], 'goods_news_id' => $request_data['news_id']])->one();
        $model->disagree +=1;
        $model->update();
        return $this->redirect(Yii::$app->request->getReferrer());
    }
}
