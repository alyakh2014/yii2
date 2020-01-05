<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 19.07.2018
 * Time: 15:55
 */

namespace app\controllers;
use app\models\Country;
use Yii;
use app\models\TestForm;

class PostController extends AppController
{

    public $layout = 'basic';

    public function beforeAction($action){
      //debug($action);
       if($action->id == 'show'){
           $this->enableCsrfValidation = false;
       }
       return parent::beforeAction($action);
    }

    public function actionIndex(){
        //$names = ['Ivanov', 'Petrov', 'Sidorov'];
        //$this->debug(Yii::$app);

//Обновляем данные в БД
        //$posts = TestForm::findOne(10);
        //$posts->email = 'test@test.ru';
        //$posts->save();
//Удаляем данные в БД
       // $posts->delete();
//Удаляем несколько записей по условию
       // TestForm::deleteAll(['>', 'id', 5]);


        $model = new TestForm();
        //$model->name = "Author";
        //$model->email = 'mail@mail.com';
        //$model->text = 'Текст сообщения';
        //$model->save();

        if($model->load(Yii::$app->request->post())){
           // debug(Yii::$app->request->post());
            if($model->save()){
                //Данные, которые мы запросили, сразу будут удалены из сессии
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->view->title = "Все статьи";
        if(Yii::$app->request->isAjax){
            //debug($_POST);
            Yii::$app->request->post();
            return 'test';
        }
        return $this->render('test', compact('model'));
    }

    public function actionShow(){
       // $this->layout = 'basic';
        $this->view->title = "Одна статья";
        $this->view->registerMetaTag(["name" => 'keywords', 'content'=>'Ключевики']);
        $this->view->registerMetaTag(["name"=>'description', 'content'=>'Описание страницы']);

        $cats = Country::find()->orderBy(['name'=> SORT_ASC])->all();
        $catsarray = Country::find()->asArray()->where("code='BR'")->all();
        $catsarray1 = Country::find()->asArray()->where(['code' => 'DE'])->all();
        $catsarray2 = Country::find()->asArray()->where(['like', 'name','ra'])->limit(1)->all();
        // = $catsarray2 = Country::find()->asArray()->where(['like', 'name','ra'])->limit(1)->one();
        $catsarray3 = Country::find()->asArray()->count();
        $newCase = Country::findOne(['population'=>65097000]);
        $newCase1 = Country::findAll(['population'=>65097000]);
        //For random query
        //
        //$query = 'SELECT * FROM country WHERE name LIKE :search';
        //$cats = Country::findBySql($query, [':search'=>'%ra%'])->all();
        //
        return $this->render('show', compact('cats', 'catsarray', 'catsarray1', 'catsarray2', 'catsarray3',
            'newCase', 'newCase1'));
    }
}