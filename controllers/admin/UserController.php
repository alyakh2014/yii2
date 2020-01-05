<?php
namespace app\controllers\admin;
use app\controllers\AppController;
use yii\web\Controller;
/**
 * Created by PhpStorm.
 * User: A.Khudenko
 * Date: 05.08.2018
 * Time: 09:04
 */
class UserController extends AppController{
    public function actionIndex(){
        return $this->render('index');
    }


}