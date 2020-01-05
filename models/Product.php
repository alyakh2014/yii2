<?php
/**
 * Created by PhpStorm.
 * User: A.Khudenko
 * Date: 25.08.2018
 * Time: 10:49
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id'=> 'category_id']);
    }
}