<?php
/**
 * Created by PhpStorm.
 * User: A.Khudenko
 * Date: 26.08.2018
 * Time: 09:07
 */

namespace app\components;
use yii\jui\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{

    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    function init(){
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        //get cache
        $menu = \Yii::$app->cache->get('menu');
        if($menu) return $menu;

        $this->data = Category::find()->indexBy("id")->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
       // debug($this->tree);
        //set cache; the first param - is a key of cache, the second - is data, the third - is a lifetime of cache
        Yii::$app->cache->set('menu', $this->menuHtml, 60);
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach($this->data as $id=>&$node){
            if(!$node['parent_id']) $tree[$id] = &$node;
            else $this->data[$node["parent_id"]]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach($tree as $category){
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__."/menu_tpl/".$this->tpl;
        return ob_get_clean();
    }
}