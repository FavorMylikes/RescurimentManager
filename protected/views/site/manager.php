<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/10/20
 * Time: 16:43
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
        'headerButtons'=>array(
            array(
                'class' => 'booster.widgets.TbButton',
                'label' => '导出',
                'buttonType'=>'submitLink',
                'url'=>'',
                'htmlOptions'=>array(
                    'href' => $this->createUrl('userInfoFile'),

                ),
                'context'=>'info',
                'size' => 'small'
            ),
        ),
        'contentHtmlOptions'=>array('align'=>'center','style'=>' overflow:auto; '),
        'htmlOptions' => array('class' => 'bootstrap-widget-table','style'=>' overflow:auto; ')
    )
);
$this->widget('booster.widgets.TbGridView', array(
    'id'=>'user-info-grid',
    'dataProvider'=>$model->search(30),
    'filter'=>$model,
    'htmlOptions'=>array('style'=>'width:6000px;padding-top:10px;margin-right:200px;'),

    'columns'=>array(
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template'=>'{top}{untop}',
            'htmlOptions'=>array('style'=>'width: 20px; '),
            'buttons'=>array(
                'top'=>array(
                    'label'=>'<i class="glyphicon glyphicon-ok"></i>',
                    'url'=>'Yii::app()->getController()->createUrl("save", array("id"=>$data->id))',
                    'visible'=>'$data->status==0',
                    'options'=>array('title'=>Yii::t('app', '确认存档')),
                ),
                'untop'=>array(
                    'label'=>'<i class="glyphicon glyphicon-repeat"></i>',
                    'url'=>'Yii::app()->getController()->createUrl("undo", array("id"=>$data->id))',
                    'visible'=>'$data->status ==1',
                    'options'=>array('title'=>Yii::t('app', '撤销存档')),
                ),
            )
        ),
        array('name'=>'name','type'=>'raw','headerHtmlOptions'=>array('style'=>'width:85px;'),'value'=>'CHtml::link($data->name,Yii::app()->getController()->createUrl("information", array("id"=>$data->id)))'),
        array('name'=>'age','headerHtmlOptions'=>array('style'=>'width:50px;'),),
        array('name'=>'gender','headerHtmlOptions'=>array('style'=>'width:50px;'),),
        array('name'=>'birth_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        array('name'=>'nation','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        array('name'=>'mobile_telephone_number','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        'origin',
        array('name'=>'account_nature','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        array('name'=>'marriage','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        'registered_permanent_residence',
        'id_number',
        array('name'=>'education','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        'professional',
        array('name'=>'graduation_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        'school_name',
        'email',
        array('name'=>'emergency_contact','headerHtmlOptions'=>array('style'=>'width:120px;'),),
        array('name'=>'emergency_contant_telephone_number','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        array('name'=>'social_security_state','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        'address',
       array('name'=> 'disease','headerHtmlOptions'=>array('style'=>'width:60px;'),),

        array('name'=>'university_start_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        array('name'=>'university_end_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        'university_school_name',
        array('name'=>'university_education','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        array('name'=>'university_professional','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        array('name'=> 'master_start_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        array('name'=> 'master_end_date','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        'master_school_name',
        array('name'=>'master_education','headerHtmlOptions'=>array('style'=>'width:60px;'),),
        array('name'=>'master_professional','headerHtmlOptions'=>array('style'=>'width:60px;'),),

        array('name'=> 'work_start_date1','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        array('name'=> 'work_end_date1','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        'company1',
        'department1',
        'duties1',
        array('name'=> 'work_start_date2','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        array('name'=> 'work_end_date2','headerHtmlOptions'=>array('style'=>'width:90px;'),),
        'company2',
        'duties2',
        'department2',

        'family_member_name1',
        'family_member_relation1',
        'family_member_company1',
        array('name'=>'family_member_phone_number1','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        'family_member_name2',
        'family_member_relation2',
        'family_member_company2',
        array('name'=>'family_member_phone_number2','headerHtmlOptions'=>array('style'=>'width:80px;'),),
        'bank_name',
        'bank_card_number',
        'vocational_certificate',

),
));
$this->endWidget();?>
<style>
    .grid-view .summary
    {
        margin: 0 0 5px 20px;
        text-align: left;
    }
</style>
