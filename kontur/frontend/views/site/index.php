<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\UploadFormModel;
/** @var yii\web\View $this */

$this->title = 'TestJob by Musikhin';
$model = new UploadFormModel();

?>
<div class="site-index">
    <div class=" bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">

            <h2 >Форма с тремя обязательными полями!</h2>
            <?=  Yii::$app->session->getFlash('upload_success'); ?>
            <hr class="index-form-hr">
        </div>
    </div>
</div>

<!--    --><?php //$form = ActiveForm::begin(['enableAjaxValidation' => true, 'id'=>'full_form_id']); ?>
<?php $form = ActiveForm::begin(['enableAjaxValidation' => false, 'id'=>'full_form_id']); ?>
<?php //$form = ActiveForm::begin(); ?>

<div class="row justify-content-center">
    <div class="col-lg-4 text-left">


        <?= $form->field($model, 'username');?>
        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(),
            [
                'mask' => '+7 (999) 999-99-99',
                'name' => 'phone',
                'id' => 'phone',
            ])->textInput();


        ;?>
        <?= $form->field($model, 'email');?>
        <?= Html::submitButton('Отправить форму', ['class' => 'btn btn-primary send-form-button ', 'name' => 'send-form-button',]) ?>

    </div>
</div>
    <?php ActiveForm::end(); ?>

<!---->
<!---->
<!---->
<?//= Html::Button('Test AJAX', ['class' => 'btn btn-primary send-form-button2 ', 'name' => 'send-form-button2','id' => 'send-form-button2']) ?>
<?php
//$js = <<<JS
//var data = document.getElementById('uploadformmodel-username');
//var url = $('#user-profile').attr('action');
//$('#send-form-button2').on('click', function() {
//  $.ajax({
//  // url: 'index.php?r=post/index',  //куда отправится запрос
//    url: url ,  //куда отправится запрос
//  data: data,
//  type: 'POST',
//  success: function(res) {
//    console.log(res);
//  },
//  error: function(){
//      alert('Errors');
//  }
//  });
//});
//
//JS;
//$this->registerJs($js);