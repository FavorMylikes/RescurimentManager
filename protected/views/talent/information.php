<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/12/29
 * Time: 10:14
 */
?>

<?php
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'info-form',
        'enableAjaxValidation'=>true,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
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
        //姓名
        echo $form->textFieldGroup($model, 'name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //性别
        echo $form->dropDownListGroup($model, 'gender', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18%;'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('男'=>'男', '女'=>'女'), 'htmlOptions' => array(),)));
        //工作年限
        echo $form->textFieldGroup($model, 'work_age', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions'=>array('htmlOptions'=>array())));
        //年龄
        echo $form->textFieldGroup($model, 'age', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18%;'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',),'widgetOptions'=>array('htmlOptions'=>array('tabindex'=>0))));
        //QQ号
        echo $form->textFieldGroup($model, 'qq_number', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:27%;float:right;'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',),'widgetOptions'=>array('htmlOptions'=>array('tabindex'=>0))));
        ?>
    </div><div class="row">
        <?php
        //手机号
        echo $form->textFieldGroup($model, 'mobile_telephone_number', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //婚姻状况
        echo $form->dropDownListGroup($model, 'way', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('后台下载'=>'后台下载','主动投递'=>'主动投递'), 'htmlOptions' => array(),)));
        //电子邮箱
        echo $form->textFieldGroup($model, 'email', array('groupOptions'=>array('class'=>'col-sm-6','style'=>'float:right;width:49%'),'labelOptions'=>array('class'=>'col-sm-3'),'widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'非公司邮箱',),),'wrapperHtmlOptions' => array('class' => 'col-sm-9',),'prepend' => '<i class="glyphicon glyphicon-envelope"></i>'));
        ?>
    </div><div class="row">
        <?php
        //招聘种类
        echo $form->dropDownListGroup($model, 'recruitment_type', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array(
            'data' => $model->getRecruitmentType(), 'htmlOptions' => array(
                'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('//talent/recruitmentSource'), //url to call.
                    //'update'=>'#cateId',//success会覆盖update设置，update最终还是通过sucess来实现
                    'data'=>new CJavaScriptExpression('$("#TalentInfo_recruitment_type").serialize()'),
                    'success'=>'function(data){
                    jQuery("#TalentInfo_recruitment_source").val(null).trigger("change");
                    jQuery("#TalentInfo_recruitment_source").select2({"maximumSelectionSize":1,"tags":eval("(" + data + ")"),"placeholder":"支持新添加类别","width":"resolve"});
                    }'
                ),),)));//eval("(" + data + ")")字符串转换为js对象
        //招聘来源typeAheadGroup
        echo $form->select2Group($model, 'recruitment_source', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8','id'=>'cateId'),  'widgetOptions' => array('asDropDownList' => false,'options' => array( 'maximumSelectionSize'=>1,'tags' => $model->getRecruitmentSource() ,'placeholder' => '支持新添加类别',))));
        //所获职业证书
        echo $form->select2Group($model, 'vocational_certificate', array('groupOptions'=>array('class'=>'col-sm-6','style'=>'float:right;width:49%'),'labelOptions'=>array('class'=>'col-sm-3','style'=>''),'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>''), 'widgetOptions' => array('asDropDownList' => false, 'options' => array('tags' => array('PMP', '系统分析师', '系统架构设计师', '系统规划与管理师','软件评测师','软件设计师','程序员','系统集成师','数据库系统工程师'), 'placeholder' => '如果不在列表中请直接写证书名', 'tokenSeparators' => array(',', ' ')))));
        ?>
    </div>
    <div class="row">
        <?php
        //招聘种类
        echo $form->dropDownListGroup($model, 'department_id', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array(
            'data' => $model->getDepartments(), 'htmlOptions' => array(
                'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('//talent/departments'), //url to call.
                    //'update'=>'#cateId',//success会覆盖update设置，update最终还是通过sucess来实现
                    'data'=>new CJavaScriptExpression('$("#TalentInfo_department_id").serialize()'),
                    'success'=>'function(data){
                    jQuery("#TalentInfo_position").val(null).trigger("change");
                    jQuery("#TalentInfo_position").select2({"maximumSelectionSize":1,"tags":eval("(" + data + ")"),"placeholder":"支持新添加岗位","width":"resolve"});
                    }'
                ),),)));//eval("(" + data + ")")字符串转换为js对象
        //招聘来源typeAheadGroup
        echo $form->select2Group($model, 'position', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8','id'=>'cateId'),  'widgetOptions' => array('asDropDownList' => false,'options' => array( 'maximumSelectionSize'=>1,'tags' => $model->getPositions() ,'placeholder' => '支持新添加新岗位',))));
        //备注
        echo $form->textFieldGroup($model, 'remarks', array('groupOptions'=>array('class'=>'col-sm-6','style'=>'width:49%;float:right'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9',), ));
        ?>
    </div>
    <legend>工作经历</legend>
    <!--工作经历一-->
    <div class="row">
        <?php echo $form->textAreaGroup($model,'experience_work',array(
            'groupOptions'=>array('class'=>'col-sm-12','style'=>'padding-right: 0px;'),
            'widgetOptions' =>  array(
                'htmlOptions'   =>  array('style'=>'min-height:150px;resize: none;'),
            ),
            'labelOptions'=>array('class'=>'col-sm-1','style'=>'width:9.3%;'),
            'wrapperHtmlOptions' => array('class' => 'col-sm-11','style'=>'width:90.7%;padding-right:0px;'),
        )); ?>
    </div>
    <legend>项目经验</legend>
    <!--项目经验-->
    <div class="row">
        <?php echo $form->textAreaGroup($model,'experience_project',array(
            'groupOptions'=>array('class'=>'col-sm-12','style'=>'padding-right: 0px;'),
            'widgetOptions' =>  array(
                'htmlOptions'   =>  array('style'=>'min-height:150px;resize: none;'),
            ),
            'labelOptions'=>array('class'=>'col-sm-1','style'=>'width:9.3%;'),
            'wrapperHtmlOptions' => array('class' => 'col-sm-11','style'=>'width:90.7%;padding-right:0px;'),
        )); ?>
    </div>
    <legend>教育经历</legend>
    <!-- 教育经历-->
    <div class="row">
        <?php echo $form->textAreaGroup($model,'experience_education',array(
            'groupOptions'=>array('class'=>'col-sm-12','style'=>'padding-right: 0px;'),
            'widgetOptions' =>  array(
                'htmlOptions'   =>  array('style'=>'min-height:150px;resize: none;'),
            ),
            'labelOptions'=>array('class'=>'col-sm-1','style'=>'width:9.3%;'),
            'wrapperHtmlOptions' => array('class' => 'col-sm-11','style'=>'width:90.7%;padding-right:0px;'),
        )); ?>
    </div>

    <div class="form-actions" style="float:right;margin-right:40px;">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => '提交'
            )
        ); ?>
    </div>

</fieldset>
<?php
$this->endWidget();
?>
<script type="text/javascript">

    $('textarea').each(function () {
        this.setAttribute('style', 'min-height:150px;height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
</script>
