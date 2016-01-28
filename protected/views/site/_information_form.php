<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/10/28
 * Time: 15:39
 */
$box = $this->beginWidget(
    'booster.widgets.TbPanel',
    array(
        'title' => Yii::app()->user->name,
        'context' => 'info',
        'padContent' => false,
        'headerIcon' => 'user',
        'headerHtmlOptions'=>array('align'=>'center'),
        'contentHtmlOptions'=>array('align'=>'center','style'=>'margin:20px auto;'),
        'htmlOptions' => array('class' => '','style'=>'margin:0 auto;')
    )
);
$this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => '进入查看员工列表',
        'context' => 'info',
        'buttonType'=>'link',
        'url'=>array('//site/manager'),
        'visible'=>in_array(Yii::app()->user->isAdmin(),[1,2]),
        'htmlOptions'=>array('style'=>'margin:3px;text-decoration:none;background-color: #d9edf7;padding-left:40px;padding-right:40px;')
    )
);
$this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => '进入查看招聘进程',
        'context' => 'info',
        'buttonType'=>'link',
        'url'=>array('//talent/recruitmentProcess'),
        'visible'=>in_array(Yii::app()->user->isAdmin(),[1,3,4]),
        'htmlOptions'=>array('style'=>'margin:3px;text-decoration:none;background-color: #d9edf7;padding-left:40px;padding-right:40px;')
    )
);
$this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => '进入更改信息',
        'context' => 'info',
        'buttonType'=>'link',
        'url'=>array('//site/information'),
        'visible'=>Yii::app()->user->isAdmin()==0,
        'htmlOptions'=>array('style'=>'text-decoration:none;background-color: #d9edf7;padding-left:40px;padding-right:40px;')
    )
);
$this->endWidget();
?>

