<?php
/**
 * Created by PhpStorm.
 * User: A.Khudenko
 * Date: 02.09.2018
 * Time: 14:26
 */

namespace app\controllers;
use app\controllers\AppController;
use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController
{

    public function actionView($id){
        $id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        if (empty($product)) {
            throw new \yii\web\HttpException(404, 'Такого товара нет');
        }
        $this->setMeta('E-Shopper | '. $product->name, $product->description, $product->keywords);
        $hits = Product::find()->where(['hit'=>'1'])->limit(6)->all();
        return $this->render('view', compact('product', 'hits'));
    }
}