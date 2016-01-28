<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2016/1/4
 * Time: 11:29
 */
?>
<?php
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'info-form',
        'enableClientValidation' => true,
        'type' => 'inline',
        'htmlOptions' => array('class' => 'row','style'=>'float:left;width:100%;'),
    )
);
?><?php
echo $form->hiddenField($model, 'talent_id', array('value' => $data->id));
echo $form->hiddenField($model, 'next_option_id', array('value' => $next_option->id));
if (in_array($next_option->id, [2, 4])) {
    echo $form->select2Group($model, 'middleman', array('groupOptions' => array('class' => '', 'style' => 'width:28%;margin-left:15px;'), 'wrapperHtmlOptions' => array('class' => ''), 'widgetOptions' => array('data' => UserInfo::model()->getUserNames(), 'htmlOptions' => array('style' => 'width:100%;min-width:0px;', 'id' => 's2id_TalentStatus_middleman' . $data->id), 'asDropDownList' => true, 'options' => array('maximumSelectionSize' => 1, 'placeholder' => '面试人',))));
    echo $form->datetimePickerGroup($model, 'setup_datetime', array('groupOptions' => array('class' => '', 'style' => 'width:40%;margin-left:15px;'), 'widgetOptions' => array('htmlOptions' => array('style' => 'min-width:0px;width: 100%;', 'id' => 'TalentStatus_setup_datetime' . $data->id), 'options' => array('language' => 'zh-CN', 'format' => 'yyyy-mm-dd hh:ii', 'startDate' => '-0d -2w', 'endDate' => '+1m', 'todayHighlight' => true, 'minuteStep'=>30,'startView' => 2, 'minViewMode' => 1, 'autoclose' => true),),));
} elseif (in_array($next_option->id, [5])){
    echo $form->hiddenField($model, 'middleman', array('value' => ''));
    echo CHtml::tag('div',array('class'=>'form-group','style' => 'width:29%;margin-left:15px;'),'');
    echo $form->datetimePickerGroup($model, 'setup_datetime', array('groupOptions' => array('class' => '', 'style' => 'width:40%;margin-left:15px;'), 'widgetOptions' => array('htmlOptions' => array('style' => 'min-width:0px;width: 100%;', 'id' => 'TalentStatus_setup_datetime' . $data->id), 'options' => array('language' => 'zh-CN', 'format' => 'yyyy-mm-dd hh:ii', 'startDate' => '-0d -2w', 'endDate' => '+1m', 'todayHighlight' => true, 'minuteStep'=>30,'startView' => 2, 'minViewMode' => 1, 'autoclose' => true),),));

}
?>
    <div class=" form-group" style="float:right;vertical-align: middle;padding:2px;">
        <?php
        $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => $next_option->opt,
                'size' => 'small',
                'htmlOptions'=>array('style'=>'')
            )
        );
        ?>
    </div>
<?php
$this->endWidget();
?>