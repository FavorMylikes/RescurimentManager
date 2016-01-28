<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/10/20
 * Time: 18:13
 */ ?>
<?php
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'info-form',
        'enableClientValidation'=>true,
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
        echo $form->textFieldGroup($user_info, 'name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //性别
        echo $form->dropDownListGroup($user_info, 'gender', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18.67%'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('男'=>'男', '女'=>'女'), 'htmlOptions' => array(),)));
        //年龄
        echo $form->textFieldGroup($user_info, 'age', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:18.33%'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //民族
        echo $form->textFieldGroup($user_info, 'nation', array('groupOptions'=>array('class'=>'col-sm-2'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //籍贯
        echo $form->textFieldGroup($user_info, 'origin', array('groupOptions'=>array('class'=>'col-sm-3','style'=>'width:35%;float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        ?>
        </div><div class="row">
        <?php
        //学历
        echo $form->dropDownListGroup($user_info, 'education', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('本科'=>'本科', '大专'=>'大专','硕士'=>'硕士','博士'=>'博士'), 'htmlOptions' => array(),)));
        //手机号
        echo $form->textFieldGroup($user_info, 'mobile_telephone_number', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //电子邮箱
        echo $form->textFieldGroup($user_info, 'email', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'非公司邮箱',),),'wrapperHtmlOptions' => array('class' => 'col-sm-8',),'prepend' => '<i class="glyphicon glyphicon-envelope"></i>'));
        ?>
        </div><div class="row">
        <?php
        //学校
        echo $form->textFieldGroup($user_info, 'school_name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //专业
        echo $form->textFieldGroup($user_info, 'professional', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //毕业时间
        echo $form->datePickerGroup($user_info, 'graduation_date', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'2016-08-01','todayHighlight'=>true,'startView'=>1,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
        ?>
        </div><div class="row">
        <?php
        //婚姻状况
        echo $form->dropDownListGroup($user_info, 'marriage', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('未婚'=>'未婚','已婚'=>'已婚'), 'htmlOptions' => array(),)));
        //身份证号码
        echo $form->textFieldGroup($user_info, 'id_number', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
        //出生日期
        echo $form->datePickerGroup($user_info, 'birth_date', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
        ?>
        </div><div class="row">
        <?php
        //社保情况
        echo $form->dropDownListGroup($user_info, 'social_security_state', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('已建立'=>'已建立','未建立'=>'未建立'), 'htmlOptions' => array(),)));
        //地址
        echo $form->textFieldGroup($user_info, 'address', array('groupOptions'=>array('class'=>'col-sm-9','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9',), ));
        ?>
        </div><div class="row">
        <?php
        //户口性质
        echo $form->dropDownListGroup($user_info, 'account_nature', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('外埠城镇'=>'外埠城镇','外埠农村'=>'外埠农村','本市城镇'=>'本市城镇','本市农村'=>'本市农村'), 'htmlOptions' => array(),)));
        //户口所在地
        echo $form->textFieldGroup($user_info, 'registered_permanent_residence', array('groupOptions'=>array('class'=>'col-sm-9','style'=>'float:right'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9',), ));
        ?>
        </div><div class="row">
        <?php
        //重大疾病
        echo $form->dropDownListGroup($user_info, 'disease', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('无'=>'无','有'=>'有'), 'htmlOptions' => array(),)));
        //紧急联系人姓名
        echo $form->textFieldGroup($user_info, 'emergency_contact', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //紧急联系人联系方式
        echo $form->textFieldGroup($user_info, 'emergency_contant_telephone_number', array('groupOptions'=>array('class'=>'col-sm-5','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        ?>
        </div><div class="row">
        <?php
//        //银行名称
//        echo $form->dropDownListGroup($user_info, 'bank_name', array('groupOptions'=>array('class'=>'col-sm-3'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), 'widgetOptions' => array('data' => array('北京银行'=>'北京银行','招商银行'=>'招商银行'), 'htmlOptions' => array('disabled'=>'disabled'),)));
//        //银行卡号
//        echo $form->textFieldGroup($user_info, 'bank_card_number', array('groupOptions'=>array('class'=>'col-sm-4','style'=>''),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',),'widgetOptions' => array('htmlOptions' => array('disabled'=>'disabled'),) ));

        //所获职业证书
        echo $form->select2Group($user_info, 'vocational_certificate', array('groupOptions'=>array('class'=>'col-sm-12','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-1','style'=>'width:9.3%;'),'wrapperHtmlOptions' => array('class' => 'col-sm-11','style'=>'width:90.7%;padding-right:0px;'), 'widgetOptions' => array('asDropDownList' => false, 'options' => array('tags' => array('PMP', '系统分析师', '系统架构设计师', '系统规划与管理师','软件评测师','软件设计师','程序员','系统集成师','数据库系统工程师'), 'placeholder' => '如果不在列表中请直接写证书名', 'tokenSeparators' => array(',', ' ')))));
        ?>
            </div>
        <legend>教育经历</legend>
        <!-- 大学学历-->
        <div class="row">
        <?php
        //毕业院校
        echo $form->textFieldGroup($user_info, 'university_school_name', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        ?>
        <div class="col-sm-5">
            <?php
            //学历
            echo $form->dropDownListGroup($user_info, 'university_education', array('groupOptions'=>array('class'=>'col-sm-6'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), 'widgetOptions' => array('data' => array('大专'=>'大专','本科'=>'本科'), 'htmlOptions' => array(),)));
            //所学专业
            echo $form->textFieldGroup($user_info, 'university_professional', array('groupOptions'=>array('class'=>'col-sm-7','style'=>''),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
            ?>
        </div>
        <div class="col-sm-4" style="float:right;">
            <?php
            //入学年月
            echo $form->datePickerGroup($user_info, 'university_start_date', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-0d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            //毕业年月
            echo $form->datePickerGroup($user_info, 'university_end_date', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'+2y','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            ?>
        </div>
        </div>

        <!-- 大学以上学历-->
        <div class="row">
        <?php
        //毕业院校
        echo $form->textFieldGroup($user_info, 'master_school_name', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        ?>
        <div class="col-sm-5">
            <?php
            //学历
            echo $form->dropDownListGroup($user_info, 'master_education', array('groupOptions'=>array('class'=>'col-sm-6'),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), 'widgetOptions' => array('data' => array('硕士'=>'硕士','博士'=>'博士'), 'htmlOptions' => array(),)));
            //所学专业
            echo $form->textFieldGroup($user_info, 'master_professional', array('groupOptions'=>array('class'=>'col-sm-7','style'=>''),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
            ?>
        </div>
        <div class="col-sm-4" style="float:right;">
            <?php
            //入学年月
            echo $form->datePickerGroup($user_info, 'master_start_date', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            //毕业年月
            echo $form->datePickerGroup($user_info, 'master_end_date', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            //--大学学历
            ?>
        </div>
        </div>


        <legend>工作经历</legend>
        <!--工作经历一-->
        <div class="row">
        <?php
        //单位
        echo $form->textFieldGroup($user_info, 'company1', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        ?>
        <div class="col-sm-5">
            <?php
            //部门
            echo $form->textFieldGroup($user_info, 'department1', array('groupOptions'=>array('class'=>'col-sm-6','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
            //职位
            echo $form->textFieldGroup($user_info, 'duties1', array('groupOptions'=>array('class'=>'col-sm-7','style'=>''),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
            ?>
        </div>
        <div class="col-sm-4" style="float:right;">
            <?php
            //入学年月
            echo $form->datePickerGroup($user_info, 'work_start_date1', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            //毕业年月
            echo $form->datePickerGroup($user_info, 'work_end_date1', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            ?>
        </div>
        </div>

        <!-- 工作经历二-->
        <div class="row">
        <?php
        //单位
        echo $form->textFieldGroup($user_info, 'company2', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        ?>
        <div class="col-sm-5">
            <?php
            //部门
            echo $form->textFieldGroup($user_info, 'department2', array('groupOptions'=>array('class'=>'col-sm-6','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
            //职位
            echo $form->textFieldGroup($user_info, 'duties2', array('groupOptions'=>array('class'=>'col-sm-7','style'=>''),'labelOptions'=>array('class'=>'col-sm-4'),'wrapperHtmlOptions' => array('class' => 'col-sm-8',), ));
            ?>
        </div>
        <div class="col-sm-4" style="float:right;">
            <?php
            //入学年月
            echo $form->datePickerGroup($user_info, 'work_start_date2', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'padding-right:0px;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            //毕业年月
            echo $form->datePickerGroup($user_info, 'work_end_date2', array('groupOptions'=>array('class'=>'col-sm-7','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-4'),'widgetOptions' => array('htmlOptions'=>array('style'=>'min-width:0px'),'options' => array('language' => 'zh-CN','format'=>'yyyy-mm-dd','endDate'=>'-d','todayHighlight'=>true,'startView'=>2,'minViewMode'=>1,'autoclose'=>true),),'wrapperHtmlOptions' => array('class' => 'col-sm-8'),));
            ?>
        </div>
        </div>
        <legend>家庭主要成员</legend>
        <div class="row">
        <?php
        //姓名
        echo $form->textFieldGroup($user_info, 'family_member_name1', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //关系
        echo $form->textFieldGroup($user_info, 'family_member_relation1', array('groupOptions'=>array('class'=>'col-sm-2','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //电话
        echo $form->textFieldGroup($user_info, 'family_member_phone_number1', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //工作单位
        echo $form->textFieldGroup($user_info, 'family_member_company1', array('groupOptions'=>array('class'=>'col-sm-4','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>'padding-right:30px;'), ));
        ?>
        </div>
        <div class="row">
        <?php
        //姓名
        echo $form->textFieldGroup($user_info, 'family_member_name2', array('groupOptions'=>array('class'=>'col-sm-3','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //关系
        echo $form->textFieldGroup($user_info, 'family_member_relation2', array('groupOptions'=>array('class'=>'col-sm-2','style'=>''),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //电话
        echo $form->textFieldGroup($user_info, 'family_member_phone_number2', array('groupOptions'=>array('class'=>'col-sm-4'),'labelOptions'=>array('class'=>'col-sm-5'),'wrapperHtmlOptions' => array('class' => 'col-sm-7',), ));
        //工作单位
        echo $form->textFieldGroup($user_info, 'family_member_company2', array('groupOptions'=>array('class'=>'col-sm-4','style'=>'float:right;'),'labelOptions'=>array('class'=>'col-sm-3'),'wrapperHtmlOptions' => array('class' => 'col-sm-9','style'=>'padding-right:30px;'), ));
        ?>
        </div>

        <div class="form-actions" style="float:right;margin-right:40px;">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'visible'=>Yii::app()->user->isAdmin()==0,
                'context' => 'primary',
                'label' => '提交'
            )
        ); ?>
        </div>

    </fieldset>
<?php
$this->endWidget();
?>