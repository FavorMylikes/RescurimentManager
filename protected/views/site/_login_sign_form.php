<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/10/28
 * Time: 15:36
 */
 ?>
<div id="nav_login">
    <?php $this->widget(
        'booster.widgets.TbButtonGroup',
        array(
            'justified' => true,
            'htmlOptions'=>array('style'=>'margin:0px 0px 20px'),
            'buttons' => array(
                array('label' => '登录', 'url' => '#','htmlOptions'=>array('onClick'=>'$("#sign-form").hide(); $("#login-form").show();')),
                array('label' => '注册', 'url' => '#','htmlOptions'=>array('onClick'=>'$("#login-form").hide(); $("#sign-form").show();')),
            ),
        )
    ); ?>
</div><!--login-sign-nav-->
<div class="form">
    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array('style'=>''),
        'action'=>$this->createUrl('login'),
    )); ?>

    <?php echo $form->errorSummary($login_model); ?>

    <?php echo $form->textFieldGroup($login_model,'username',array('class'=>'input-block-level')); ?>

    <?php echo $form->passwordFieldGroup($login_model,'password',array('class'=>'input-block-level')); ?>


    <div class="row rememberMe">
        <?php echo $form->checkBox($login_model,'rememberMe',array('checked'=>"checked")); ?>
        <?php echo $form->label($login_model,'rememberMe'); ?>
        <div class="pull-right">
            <?php echo CHtml::submitButton(Yii::t('app','登录'),array('class'=>'btn btn-primary')); ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
<div class="form">
    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
        'id'=>'sign-form',
        'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array('style'=>'display:none'),
        'action'=>$this->createUrl('sign'),
    )); ?>

    <?php echo $form->errorSummary($sign_model); ?>

    <?php echo $form->textFieldGroup($sign_model,'user_name',array('class'=>'input-block-level')); ?>

    <?php echo $form->passwordFieldGroup($sign_model,'user_pass',array('class'=>'input-block-level')); ?>

    <?php echo $form->passwordFieldGroup($sign_model,'user_pass2',array('size'=>60,'maxlength'=>20,'class'=>'input-block-level')); ?>

    <div class="row buttons">
        <div class="pull-right">
            <?php echo CHtml::submitButton(Yii::t('app','注册'),array('class'=>'btn btn-primary')); ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
