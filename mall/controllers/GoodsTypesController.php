<?php

namespace mall\controllers;

use Yii;
use backend\models\GoodsTypes;
use common\controllers\CshopController;
use backend\models\TypesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsTypesController implements the CRUD actions for GoodsTypes model.
 */
class GoodsTypesController extends CshopController
{
    /**
     * Lists all GoodsTypes models.
     * @return mixed
     */
    public function actionList()
    {
        $this->layout = 'index2';
        $type = Yii::$app->request->get('type');
        $tips = "模块开发中...";
        return $this->render('list',[
            'tips' => $tips
        ]);
    }
}
