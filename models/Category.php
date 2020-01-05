<?php
/**
 * Created by PhpStorm.
 * User: A.Khudenko
 * Date: 25.08.2018
 * Time: 10:49
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id'=> 'id']);
    }
}