<?php

namespace news\controllers;

use common\controllers\CnewsController;
class HomeController extends CnewsController
{
    public function actionIndex()
    {
        $this->layout = 'index';
        return $this->render('index');
    }

}
