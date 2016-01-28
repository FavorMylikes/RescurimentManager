<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>
<?php
echo Chtml::openTag('div', array('class' => 'col-sm-12 col-xs-8'));
echo Chtml::openTag('div', array('class'=>'col-sm-10','style' => 'margin:0px auto;float: none;'));
echo Chtml::openTag('div', array('style' => 'width: 70%;display: inline-block;','align'=>'center'));
echo Chtml::imageButton(Yii::app()->baseUrl . "/images/img_" . $code . ".png", array());
?>
    <h3 style="color: #00a0e9;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        echo CHtml::encode($message);
        ?>
    </h3>
<?php
echo CHtml::closeTag('div');
echo Chtml::imageButton(Yii::app()->baseUrl . "/images/img_" . substr($code, 0, 1) . "_bj.png", array('style' => 'width: 30%;'));
echo CHtml::closeTag('div');
echo CHtml::closeTag('div');
?>