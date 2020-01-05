<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use mihaildev\ckeditor\CKEditor;

/**
 * Created by PhpStorm.
 * User: Hudenko
 * Date: 19.07.2018
 * Time: 16:02
 */
?>
<h1>View for Post controller and test page!</h1>
<p>Here is the common template</p>

<?if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= Yii::$app->session->getFlash('success');?></strong>
    </div>

<?endif;?>
<?if(Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= Yii::$app->session->getFlash('error');?></strong>
    </div>
<?endif;?>
<?$form=ActiveForm::begin();?>
<?=$form->field($model, 'name')->label('Имя')?>
<?=$form->field($model, 'email')?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
    <?
echo $form->field($model, 'text')->widget(CKEditor::className(),[
    'editorOptions' => [
    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    'inline' => false, //по умолчанию false
    ],
    ]);
?>
<?//=$form->field($model, 'text')->label('Сообщение')->textarea(["rows"=>10])?>
<?=Html::submitButton("Отправить", ['class'=>'btn btn-info'])?>
<?ActiveForm::end();?>