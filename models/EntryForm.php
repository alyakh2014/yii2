<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 03.08.2018
 * Time: 14:35
 */

namespace app\models;
use yii\base\Model;

class EntryForm extends Model
{

    public $name;
    public $email;

    public function rules(){
        return[
            [['name', 'email'],'required'],
            ['email', 'email'],
        ];
    }
}