<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 19.07.2018
 * Time: 15:53
 */

namespace app\controllers;
use yii\web\Controller;

class AppController extends Controller
{
    public function debug($arr){
        echo "<pre>".print_r($arr, true)."</pre>";
    }

    protected function setMeta($title = null, $description = null, $keywords = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);
        $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
    }
}

