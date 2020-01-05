<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 20.08.2018
 * Time: 16:41
 */
namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;

    public function init(){
        parent::init();
        /*if($this->name === null){
            $this->name = 'Guest';
        }*/
        ob_start();
    }

    public function run(){
        $content = ob_get_clean();
        $content = mb_strtoupper($content, 'utf-8');
       // return $this->render('my', ['name'=>$this->name]);
        return $this->render("my", compact('content'));
    }
}