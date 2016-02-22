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
echo $form->hiddenField($model, 'next_option_id', array('value' => 8));
if (in_array($next_option->id, [1,2,3,4,5])) {
    echo $form->dropDownListGroup($model,  'opt_details', array('groupOptions' => array('class' => '', 'style' => 'width:70%;margin-left:15px;'), 'widgetOptions' => array('data' => OptionsDetails::model()->getDetails($data->getRelated('options')->opt_category), 'htmlOptions' => array('class'=>'s2id_OptionsDetails_middleman','style' => 'width:100%;min-width:0px;', 'id' => 's2id_OptionsDetails_middleman' . $data->id))));
    //echo $form->select2Group($model, 'opt_details', array('groupOptions' => array('class' => '', 'style' => 'width:70%;margin-left:15px;'), 'widgetOptions' => array('data' => OptionsDetails::model()->getDetails($data->getRelated('options')->opt_category), 'htmlOptions' => array('style' => 'width:100%;min-width:0px;', 'id' => 's2id_OptionsDetails_middleman' . $data->id), 'asDropDownList' => true, 'options' => array('maximumSelectionSize' => 1, 'placeholder' => '拒绝缘由',))));
}else{
    echo $form->hiddenField($model, 'opt_details', array('value' => ''));
}
?>
    <div class=" form-group" style="float:right;vertical-align: middle;padding:2px;margin-right: -15px;">
        <?php
        $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => '终止招聘',
                'size' => 'small',
                'htmlOptions'=>array('style'=>'')
            )
        );
        ?>
    </div>
<?php
$this->endWidget();
?>