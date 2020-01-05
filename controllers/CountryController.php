<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 06.08.2018
 * Time: 15:10
 */

namespace app\controllers;
use Yii;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends AppController
{
    public function actionIndex(){
        $query = Country::find();
        $pagination = new Pagination([
           'defaultPageSize'=>5,
           'totalCount'=>$query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index',[
           'countries'=>$countries,
           'pagination'=>$pagination,
        ]);
    }
}