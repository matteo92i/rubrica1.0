<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\Contatti;

class ContattiController extends Controller
{
    public function actionIndex()
    {
        $contatti= Contatti::find()->all();
        return $this->render('index', ['contatti'=>$contatti]);
 
    }
}