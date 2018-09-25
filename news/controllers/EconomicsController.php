<?php

namespace news\controllers;

use common\controllers\CnewsController;
class EconomicsController extends CnewsController
{
    public function actionIndex()
    {
        $this->layout = 'index';
        return $this->render('index');
    }

}
