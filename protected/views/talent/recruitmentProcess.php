<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/11
 * Time: 16:24
 */
?>
    <style type="text/css">
        .carousel-inner i{
            display:inline;

            text-shadow:0 1px 2px rgba(0,0,0,0.6);
        }
        .carousel-inner a{
            text-decoration:none;
        }
    </style>
    <style type="text/css" xmlns="http://www.w3.org/1999/html">
        .process-block{
            display: inline-block;
        }
        .process-left-arrow{
            border-style: solid;
            width: 0px;
            border-color: #5bc0de #5bc0de #5bc0de rgba(0,0,0,0);
            border-right: 0px;
            border-width: 14px;
            float: left;
        }
        .process-right-arrow{
            border-style: solid;
            width: 0px;
            border-color: rgba(0,0,0,0) rgba(0,0,0,0) rgba(0,0,0,0) #5bc0de;
            border-right: 0px;
            border-width: 14px;
            float: right;
        }
        .process-middle{
            background-color: #5bc0de;
        }
        .process-item{

            height:28px;
            position: relative;
            line-height: 28px;
        }
    </style>
<?php
$box = $this->beginWidget(
    'booster.widgets.TbPanel',
    array(
        'title' => Yii::app()->user->name,
        'context' => 'info',
        'padContent' => false,
        'headerIcon' => 'user',
        'headerButtons'=>array(
            array(
                'class' => 'booster.widgets.TbButton',
                'label' => '导出',
                'buttonType'=>'submitLink',
                'url'=>'',
                'visible'=>in_array(Yii::app()->user->isAdmin(),[1,3]),
                'htmlOptions'=>array(
                    'href' => $this->createUrl('recruitmentProcessFile'),
                    ),
                'context'=>'info',
                'size' => 'small'
            ),
            array(
                'class' => 'booster.widgets.TbButton',
                'label' => '只看自己',
                'buttonType'=>'submitLink',
                'url'=>'',
                'visible'=>in_array(Yii::app()->user->isAdmin(),[1,3]),
                'htmlOptions'=>array(
                    'href' => $this->createUrl('recruitmentProcess',array('onlyself'=>$onlyself*-1)),
                    'style'=>'margin-right: 20px;'.($onlyself==-1?'':'background:gainsboro;'),
                ),
                'context'=>'info',
                'size' => 'small'
            ),
        ),
        'headerHtmlOptions'=>array(),
        'contentHtmlOptions'=>array('align'=>'center','style'=>' overflow:auto; '),
        'htmlOptions' => array('class' => 'bootstrap-widget-table','style'=>' overflow:auto; ')
    )
);
$this->widget('booster.widgets.TbGridView', array(
    'enableSorting'=>false,
    'id'=>'user-info-grid',
    'dataProvider'=>$model->inProcess(30,$onlyself),
    'htmlOptions'=>array('style'=>''),
    'filter'=>$model,
    'columns'=>array(
        array('name'=>'departments.department','htmlOptions'=>array('style'=>'vertical-align: middle;width:6%')),
        array('name'=>'position','htmlOptions'=>array('style'=>'vertical-align: middle;'),'headerHtmlOptions'=>array('style'=>'width:7%','class'=>'col-sm-1'),),
        array('name'=>'name','type'=>'raw','htmlOptions'=>array('style'=>'vertical-align: middle;'),'headerHtmlOptions'=>array('style'=>'width:5%','class'=>'col-sm-1'),'value'=>array($this,'getUserUrl')),
        array('name'=>'create_datetime','filter'=>'&nbsp','type'=>'raw','htmlOptions'=>array('style'=>'vertical-align: middle;'),'headerHtmlOptions'=>array('style'=>'width:128px;','class'=>''),'value'=>'date("m-d H:i",strtotime($data->update_time))'),
        //这里注意，在type=raw时如果value是字符串则直接返回，如果是数组则调用类中的函数，可以查看yiilite.php的evaluateExpression
        array('header'=>'招聘进度','filter'=>'&nbsp','name'=>'recruitmentProcess','value'=>array($this,'getRecruitmentProcess'),'htmlOptions'=>array('style'=>'vertical-align: middle;'),'headerHtmlOptions'=>array('style'=>'','class'=>'col-sm-5'),),
        array('header'=>'下一操作','type'=>'raw','headerHtmlOptions'=>array('style'=>'','class'=>'col-sm-4'),'value'=>array($this,'getRecruitmentNextProcess')),
    ),
));
$this->endWidget();?>