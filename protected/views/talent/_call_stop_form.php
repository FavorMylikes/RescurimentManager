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
        'id' => 'formid_OptionsDetails_CallStop' . $data->id,
        'enableClientValidation' => true,
        'type' => 'inline',
        'action'=>'#',
        'htmlOptions'=>array(),
    )
);
?><?php
echo $form->hiddenField($model, 'talent_id', array('value' => $data->id));
echo $form->select2Group($model, 'opt_details', array('groupOptions' => array(), 'widgetOptions' => array( 'data'=>OptionsDetails::model()->getDetails(3),'htmlOptions' => array('style' => 'min-width:0px;width:100px;', 'id' => 's2id_OptionsDetails_CallStop' . $data->id), 'asDropDownList' => true, 'options' => array('style'=>'width:100%','maximumSelectionSize' => 1, 'placeholder' => '原因',))));
?>
<?php
$this->endWidget();
?>