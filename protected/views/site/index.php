<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1> -->

<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}



.mylogin{
        height: 7px;
        width: 1450px;
        margin-left:50px;
        
    }

</style>
<div class ="mylogin">
<br>  <br>              
   
<h1>Login</h1>


<p> Silakan masukkan username dan password Anda, jika belum memiliki akses silakan hubungi Administrator. </p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
        <p class="hint">
            Hint: You may login with <kbd>admin</kbd>/<kbd>admin</kbd>.
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login', array('class' => 'button blue')); ?>
    </div>
 </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

