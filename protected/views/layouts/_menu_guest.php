<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/11
 * Time: 16:52
 */
?>

<?php $this->widget('booster.widgets.TbNavbar',array(
    'brand'=>Yii::app()->name,
    'items'=>array(
        array(
            'class'=>'booster.widgets.TbMenu',
            'htmlOptions'=>array('style'=>'display:inline;','class'=>'pull-right'),
            'type'  =>  'navbar',
            'items'=>array(
                array('label' => Yii::app()->user->name,'visible'=>!Yii::app()->user->isGuest, 'url' => array('//')),
                array('label'=>Yii::t('app','退出'),'visible'=>!Yii::app()->user->isGuest, 'url'=>array('//site/logout'),'htmlOptions'=>array('class'=>'')),
            )
        )
    )
)); ?>
