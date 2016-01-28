<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/23
 * Time: 23:07
 */
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
        'type'=>'bordered',
        'hideHeader'=>true,
        'id'=>'ajaxContactView',
        'dataProvider'=>$dataProvider,
        'htmlOptions'=>array('style'=>'padding-top:0px;padding-bottom: 15px;'),
        'template'=>"{items}",
        'columns'=>array(
            'content',
            array('name'=>'time','value'=>'date("Y-m-d G:i",strtotime($data->time))','htmlOptions'=>array('style'=>'width: 140px'))
        ),
    )
);

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'contact-form',
        'htmlOptions' => array('class' => 'well'),
        'type' => 'inline',
        'action'=>Yii::app()->createUrl('//talent/contact'),
    )
);
//id
echo $form->hiddenField(ContactRecord::model(), 'id', array('value'=>$id,'id'=>'talentid','name'=>'id'));
//记录
echo $form->textFieldGroup(ContactRecord::model(), 'content',array('groupOptions'=>array('style'=>'margin:0px;display: inline-block;width:82%;'),'widgetOptions'=>array('htmlOptions'=>array('name'=>'postContact','placeholder'=>'在此记录新事件'))));

$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType' => 'inputButton',
        'id'=>'addContact',
        'context' => 'primary',
        'url'=>Yii::app()->createUrl('//talent/contact'),
        'label' => '添加',
        'htmlOptions'=>array('style'=>' margin-bottom: 2px;'),
    )
);

$this->endWidget();
Yii::app()->clientScript->registerScript('addContact','
$("#addContact").click(function(){
    var ajaxRequest;
    ajaxRequest = $("#postContact").serialize()+"&"+$("#talentid").serialize();
    $.fn.yiiGridView.update(
            "ajaxContactView",
            {data: ajaxRequest,
            type:"POST",
            url:"\contact"}
        );

});
');
?>
<style type="text/css">
    .pagination{
        margin-top:0px;
    }

</style>

