<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="col-sm-12 col-xs-8" style="margin: 20px auto;">
	<div class="col-sm-8 col-xs-12">
        <style type="text/css">
            .carousel-indicators li{
                border-color: #777;
            }
        </style>
        <?php
        $this->widget(
            'booster.widgets.TbCarousel',
            array(
                'options'=>array(),//'interval'=>2000两秒切换时间
                'displayPrevAndNext'=>false,
                'items' => array(
                    array(
                        'image' =>Yii::app()->baseUrl."/images/1.jpg",
                        'label' => '来自听云',
                        'caption' => '应用崩溃？闪退？及时发现App性能问题，拒绝用户流失',
                        'imageOptions'=>array('style'=>''),
                        'captionOptions'=>array('style'=>'color:#D7F7FF;text-shadow: 0 1px 1px rgba(0,0,0,.3);margin-bottom:20px;'),
                        'itemOptions'=>array('align'=>'center'),
                    ),
                    array(
                        'image' =>Yii::app()->baseUrl."/images/2.jpg",
                        'label' => '应用性能管理',
                        'caption' => '代码级定位服务端应用错误产生、性能下降的原因',
                        'captionOptions'=>array('style'=>'color:#3B9AEC;text-shadow: 0 1px 1px rgba(0,0,0,.3);margin-bottom:20px;'),
                        'imageOptions'=>array('style'=>''),
                        'itemOptions'=>array('align'=>'center'),
                    ),
                    array(
                        'image' =>Yii::app()->baseUrl."/images/3.jpg",
                        'label' => '行业CDN使用分类',
                        'caption' => '支持网站竞品分析，关注用户访问体验',
                        'captionOptions'=>array('style'=>'color:#3B9AEC;text-shadow: 0 1px 1px rgba(0,0,0,.3);margin-bottom:20px;'),
                        'imageOptions'=>array('style'=>''),
                        'itemOptions'=>array('align'=>'center'),
                    ),
                ),
            )
        );
        ?>
	</div>
	<div class="col-sm-4 col-xs-12" style="margin-top: 15%;">
        <?php
        if(Yii::app()->user->isGuest)
            $this->renderPartial('_login_sign_form',array('login_model'=>$login_model,'sign_model'=>$sign_model));
        else
            $this->renderPartial('_information_form');
        ?>
	</div>
</div>