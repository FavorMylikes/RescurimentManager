<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2015/11/13
 * Time: 16:01
 */
?>
<?php
    echo CHtml::openTag('div', array('class' => 'row-fluid'));
        $this->widget(
            'booster.widgets.TbThumbnails',
            array(
                'dataProvider' => $dataProvider,
                'template' => "{items}{pager}",
                'itemView' => '_info_view',
                'afterAjaxUpdate'=>"js:function(){jQuery('#TalentInfo_vocational_certificate').select2({'tags':['PMP','系统分析师','系统架构设计师','系统规划与管理师','软件评测师','软件设计师','程序员','系统集成师','数据库系统工程师'],'placeholder':'如果不在列表中请直接写证书名','tokenSeparators':[',',' '],'width':'resolve'});}"
            )
        );
    echo CHtml::closeTag('div');
?>
