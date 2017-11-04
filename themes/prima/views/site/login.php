<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<body class="notice pace-done">
<div style="padding-top: 80px;">

    <div class="row">
        <center>
        <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo-pjg.png" class="logo" alt="" width="300px">
        </center>
        <div class="form-box" id="login-box" style="background:bg-white">
            
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>
                <div class="header">
                    <b>Login</b>
                </div> 
                 <div class="body bg-gray">

                    <div class="form-group inputwrapper">
                    <div class="input-group">
                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <?php echo $form->textField($model,'username', array('class' => 'form-control span4', 'placeholder'=>'Username')); ?>
                    </div>
                    <?php echo $form->error($model,'username', array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group inputwrapper">
                    <div class="input-group">
                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <?php echo $form->passwordField($model,'password', array('class' => 'form-control span4','placeholder'=>'Password')); ?>
                    </div>          
                    <?php echo $form->error($model,'password', array('class'=>'label label-danger')); ?>
                    </div>
                    <?php echo CHtml::submitButton('Sign In', array('class' =>'btn btn-info btn-block')); ?>                   
                   <?php $this->endWidget(); ?>
                   <center>
                    <small>Copyright © 2017 Prima Jaya.</strong> All rights reserved.</small>
                   </center>          
                </div>
            </form>
            </div>
    </div>
</div>
</body>