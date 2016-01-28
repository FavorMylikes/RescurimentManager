<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/11
 * Time: 16:24
 */
?>

<?php
$box = $this->beginWidget(
    'booster.widgets.TbPanel',
    array(
        'title' => Yii::app()->user->name,
        'context' => 'info',
        'padContent' => false,
        'headerIcon' => 'user',
        'headerHtmlOptions'=>array(),
        'contentHtmlOptions'=>array('align'=>'center','style'=>' overflow:auto; '),
        'htmlOptions' => array('class' => 'bootstrap-widget-table','style'=>' overflow:auto; ')
    )
);
$this->widget('booster.widgets.TbGridView', array(
    'id'=>'user-info-grid',
    'dataProvider'=>$dataProvider,
    'enableSorting'=>false,
    'filter'=>$model,
    'htmlOptions'=>array('style'=>'vertical-align: middle;'),
    'columns'=>array(//'filter'=>CHtml::activeTextField($model, $this->name, $filterInputOptions),
        array('name'=>'departments.department','headerHtmlOptions'=>array('style'=>'width:80px'),'htmlOptions'=>array('style'=>'vertical-align: middle;')),
        array('name'=>'position','headerHtmlOptions'=>array('style'=>'width:120px;'),'htmlOptions'=>array('style'=>'vertical-align: middle;')),

        array('name'=>'name','type'=>'raw','headerHtmlOptions'=>array('style'=>'width:85px;'),'value'=>array($this,'getUserUrl'),'htmlOptions'=>array('style'=>'vertical-align: middle;')),
        //这里注意，在type=raw时如果value是字符串则直接返回，如果是数组则调用类中的函数，可以查看yiilite.php的evaluateExpression
        array('name'=>'work_age','headerHtmlOptions'=>array('style'=>'width:80px;'),'htmlOptions'=>array('style'=>'vertical-align: middle;')),
        array('name'=>'mobile_telephone_number','headerHtmlOptions'=>array('class'=>'col-sm-1'),'htmlOptions'=>array('style'=>'vertical-align: middle;'),),
        array('name'=>'email','htmlOptions'=>array('style'=>'vertical-align: middle;'),),
        array('name'=>'qq_number','headerHtmlOptions'=>array('style'=>'width:110px;'),'htmlOptions'=>array('style'=>'vertical-align: middle;'),),
        array('headerHtmlOptions'=>array('style'=>'width:128px;','class'=>''),'name'=>'update_time','type'=>'raw','value'=>'date("m-d H:i",strtotime($data->update_time))','htmlOptions'=>array('style'=>'vertical-align: middle;'),),
        array('name'=>'options.opt','headerHtmlOptions'=>array('class'=>'col-sm-1','style'=>'width:121px;'),'htmlOptions'=>array('style'=>'vertical-align: middle;'),),
        array('header'=>'邀请不成功原因','type'=>'raw','headerHtmlOptions'=>array('style'=>'','class'=>''),'value'=>array($this,'getCallStopReasoon'),'htmlOptions'=>array('style'=>'vertical-align: middle;')),
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template'=>'{callstop} {certificate}',
            'htmlOptions'=>array('style'=>'width: 20px;vertical-align: middle; '),
            'buttons'=>array(
                'certificate'=>array(
                    'label'=>'<i class="glyphicon glyphicon-earphone"></i>',
                    'url'=>'Yii::app()->getController()->createUrl("certificate", array("id"=>$data->id))',
                    'options'=>array('title'=>Yii::t('app', '邀请成功'),'style'=>'font-size:20px;'),
                ),
                'callstop'=>array(
                    'label'=>'<i class="glyphicon glyphicon-earphone"></i>',
                    'options'=>array('title'=>Yii::t('app', '邀请失败'),'style'=>'color:#bc2328;font-size:20px;'),
                    'onclick'=>'"$(\"#formid_OptionsDetails_CallStop".$data->id."\").submit()"',
                )
            )
        ),
    ),
));


$this->endWidget();?>
<style type="text/css">
    td{
        vertical-align: middle;
    }
</style>
