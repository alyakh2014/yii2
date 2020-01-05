<?php
/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 03.08.2018
 * Time: 15:00
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?$form = ActiveForm::begin();?>
    <?= $form->field($model, 'name')?>
    <?= $form->field($model, 'email')?>

    <div class="form-group">
        <?= Html::submitButton('Отправить',['class'=>'btn btn-primary'])?>
    </div>

<?ActiveForm::end();?>
