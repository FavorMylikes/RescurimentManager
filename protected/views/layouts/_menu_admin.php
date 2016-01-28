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
            'htmlOptions'=>array('style'=>'display:inline;padding:10px;',),
            'type'  =>  'navbar',
            'items'=>array(
                array('visible'=>in_array(Yii::app()->user->isAdmin(),[1,2]),'label' =>Yii::t('app','员工信息') , 'active'=>Yii::app()->controller->id=='site'&&$this->getAction()->getId()=='manager','url' => array('//site/manager')),
                array('visible'=>in_array(Yii::app()->user->isAdmin(),[1,3,4]),'label'=>Yii::t('app','招聘进度'),'active'=>Yii::app()->controller->id=='talent'&&$this->getAction()->getId()=='recruitmentProcess', 'url'=>array('//talent/recruitmentProcess'),),
                array('visible'=>in_array(Yii::app()->user->isAdmin(),[1,3,4]),'label'=>Yii::t('app','人才浏览'),'active'=>Yii::app()->controller->id=='talent'&&$this->getAction()->getId()=='manager', 'url'=>array('//talent/manager'),),
                array('visible'=>in_array(Yii::app()->user->isAdmin(),[1,3,4]),'label'=>Yii::t('app','添加人才'),'active'=>Yii::app()->controller->id=='talent'&&$this->getAction()->getId()=='addTalent', 'url'=>array('//talent/addTalent'),),
            )
        ), array(
            'class'=>'booster.widgets.TbMenu',
            'htmlOptions'=>array('style'=>'display:inline;padding:10px;','class'=>'pull-right'),
            'type'  =>  'navbar',
            'items'=>array(
                array('label' => Yii::app()->user->name,'visible'=>!Yii::app()->user->isGuest, 'url' => array('//')),
                array('label'=>Yii::t('app','退出'),'visible'=>!Yii::app()->user->isGuest, 'url'=>array('//site/logout'),'htmlOptions'=>array('class'=>'')),
            )
        ),
        in_array(Yii::app()->user->isAdmin(),[1,3,4])?
        '<form  class=" hidden-xs pull-right" style="display:inline;height:auto; margin:0 auto;padding: 8px;" method="get" action="'.Yii::app()->createUrl('//talent/search').'">
            <div class="input-append" style="display:inline;">
                <input type="text" style="border: 1px solid #ddd; padding: 4px 0 4px 1em; line-height: 22px; height: 34px; width: 240px; background-color: #fff; font-size: 14px;" name="keyword" class="keyword" placeholder="'.Yii::t('app','搜索').'" >
            </div>
       </form>':
        '',
    )
)); ?>