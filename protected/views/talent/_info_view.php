<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/11
 * Time: 16:24
 */
?>
<?php
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'info-form',
        'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
        'type' => 'horizontal',
        'action'=>Yii::app()->createUrl('//talent/update'),
        'htmlOptions' => array('class' => 'well','enctype' => 'multipart/form-data','style'=>'margin: 0px 15px;'),
    )
);
?>
<fieldset>
    <style type="text/css">.col-sm-5 {
            padding-left: 0px;
        }
        .col-sm-4 {
            padding-left: 0px;
        }
    </style>
    <legend>基本信息</legend>
    <div class="row">
        <?php
        //id
        echo $form->hiddenField($data, 'id', array('value'=>$data->id));
        //姓名
        echo $form->textFieldGroup($data, 'name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //性别
        echo $form->dropDownListGroup($data, 'gender', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18.67%'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('男'=>'男', '女'=>'女'), 'htmlOptions' => array(),)));
        //年龄
        echo $form->textFieldGroup($data, 'age', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18.33%'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //民族
        echo $form->textFieldGroup($data, 'nation', array('groupOptions'=>array('class'=>'col-sm-2'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //籍贯
        echo $form->textFieldGroup($data, 'origin', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:34%;float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        ?>
    </div><div class="row">
        <?php
        //学历
        echo $form->dropDownListGroup($data, 'education', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('本科'=>'本科', '大专'=>'大专','硕士'=>'硕士','博士'=>'博士'), 'htmlOptions' => array(),)));
        //手机号
        echo $form->textFieldGroup($data, 'mobile_telephone_number', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //电子邮箱
        echo $form->textFieldGroup($data, 'email', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'非公司邮箱',),),'wrapperHtmlOptions' => array('class' => 'col-sm-8',),'prepend' => '<i class="glyphicon glyphicon-envelope"></i>'));
        ?>
    </div><div class="row">
        <?php
        //学校
        echo $form->textFieldGroup($data, 'school_name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //专业
        echo $form->textFieldGroup($data, 'professional', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //毕业时间
        echo $form->datePickerGroup($data, 'graduation_date', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>1,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
        ?>
    </div><div class="row">
        <?php
        //婚姻状况
        echo $form->dropDownListGroup($data, 'marriage', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('未婚'=>'未婚','已婚'=>'已婚'), 'htmlOptions' => array(),)));
        //身份证号码
        echo $form->textFieldGroup($data, 'id_number', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //出生日期
        echo $form->datePickerGroup($data, 'birth_date', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
        ?>
    </div><div class="row">
        <?php
        //招聘种类
        echo $form->textFieldGroup($data, 'recruitment_type', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //招聘来源
        echo $form->textFieldGroup($data, 'recruitment_source', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //备注
        echo $form->textFieldGroup($data, 'remarks', array('groupOptions'=>array('class'=>'col-sm-6','style'=>'width:49%;float:right'),'labelOptions'=>array('class'=>'col-sm-2'),'wrapperHtmlOptions' => array('class' => 'col-sm-10',), ));
        ?>
    </div><div class="row">
        <?php
        //所获职业证书
        echo $form->select2Group($data, 'vocational_certificate', array('groupOptions'=>array('class'=>'col-sm-7',),'labelOptions'=>array('class'=>'col-sm-3','style'=>'width: 17%;'),'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>'width: 83%;'), 'widgetOptions' => array('asDropDownList' => false, 'options' => array('tags' => array('PMP', '系统分析师', '系统架构设计师', '系统规划与管理师','软件评测师','软件设计师','程序员','系统集成师','数据库系统工程师'), 'placeholder' => '如果不在列表中请直接写证书名', 'tokenSeparators' => array(',', ' ')))));
        //地址
        echo $form->textFieldGroup($data, 'address', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9',), ));
        ?>
    </div><div class="row">
        <?php
        //关键字
        echo $form->textFieldGroup($data, 'keyword', array('groupOptions'=>array('class'=>'col-sm-12','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-4','style'=>'width:10.9%;'),'wrapperHtmlOptions' => array('class' => 'col-sm-8','style'=>'width:89.1%;padding: 0px;'), ));
        ?>
    </div><div class="row">
        <div class="col-sm-8">
            <div class="row">
                <?php echo $form->textAreaGroup($data,'experience_education',array(
                    'widgetOptions' =>  array(
                        'htmlOptions'   =>  array('style'=>'height:150px;resize: none;'),
                    ),
                    'labelOptions'=>array('class'=>'col-sm-3','style'=>'width:15.5%'),
                    'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>'width:84.5%;'),
                )); ?>
            </div>
            <div class="row">

                <?php echo $form->textAreaGroup($data,'experience_work',array(
                    'widgetOptions' =>  array(
                        'htmlOptions'   =>  array('style'=>'height:150px;resize: none;'),
                    ),
                    'labelOptions'=>array('class'=>'col-sm-3','style'=>'width:15.5%'),
                    'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>'width:84.5%'),
                )); ?>
            </div>
        </div>
        <div class="col-sm-4" style="padding-left: 15px">
            <?php $box = $this->beginWidget(
                'booster.widgets.TbPanel',
                array(
                    'title' => '操作记录',
                    'headerIcon' => 'th-list',

                    'padContent' => false,
                    'htmlOptions' => array('class' => 'bootstrap-widget-table')
                )
            );?>
            <?php
                $this->renderPartial('_info_contact',array('dataProvider'=>$data->getContactRecord(),'id'=>$data->id));
            ?>
            <?php
                $this->endWidget();
            ?>
        </div>

    </div>
        <div class="form-actions" style="float:right;margin-right:40px;">
            <?php $this->widget(
                'booster.widgets.TbButton',
                array(
                    'buttonType' => 'ajaxSubmit',
                    'context' => 'primary',
                    'url'=>Yii::app()->createUrl('//talent/update'),
                    'label' => '更改',
                    'ajaxOptions'=>array('success'=>'js:function(data){
                            if(data==1)
                            alert("更改成功");
                            else
                            alert("更改异常");
                            }',),
                )
            ); ?>
        </div>

</fieldset>
<?php
$this->endWidget();
?>
