<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 19.07.2018
 * Time: 14:26
 */

namespace app\controllers;
//use yii\web\Controller;

class MyController extends AppController
{
    public function actionIndex($id = null){
        $hi = "Hello world";
        $names = ['Ivanov', 'Petrov', 'Sidorov'];
//        return $this->render('index', ['hello'=>$hi, 'names'=>$names]);//"Action index";
        return $this->render('index', compact('hi', 'names', 'id'));//"Action index";
    }

    public function actionBlogPost(){
        return 'Blog Post';
    }
}