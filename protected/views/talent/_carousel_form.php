<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2016/1/6
 * Time: 18:12
 */?>
<?php
$id='carousel_'.$data->id;
//$cs = Yii::app()->getClientScript();
//$options=array('interval'=>false);
//$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
//$cs->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').carousel('pause');");
?>

<div id=<?php echo $id; ?> class="carousel slide carousel-invite-form">
    <div class="carousel-inner">
        <div class="item active" style="width: 100%;">
            <?php
            echo CHtml::openTag('div',['style'=>'width:100%']);
            $this->renderPartial('_invite_form',array('data'=>$data,'next_option'=>$next_option,'model'=>$model));
            echo CHtml::closeTag('div');
            echo CHtml::openTag('div',['style'=>'display:inline;float:right;padding:6px 0px;']);
            $tag_i=CHtml::tag('i',array('class'=>'glyphicon glyphicon-remove','style'=>'line-height: inherit;color:#bc2328;'),'');//这里的第三参数''是为了防止<i></i>变为<i  />详情请查看CHtml::tag代码
            echo CHtml::link($tag_i,"#$id",array('data-slide'=>'next','style'=>'float:right;',));
            echo CHtml::closeTag('div');
            ?>
        </div>
        <div class="item " style="width: 100%;">
            <?php
            echo CHtml::openTag('div',['style'=>'display:inline;float:left;padding:6px 0px;']);
            $tag_i=CHtml::tag('i',array('class'=>'glyphicon glyphicon-chevron-left','style'=>'line-height: inherit;'),'');
            echo CHtml::link($tag_i,"#$id",array('data-slide'=>'prev','style'=>'float:left;',));
            echo CHtml::closeTag('div');

            echo CHtml::openTag('div',['style'=>'width:91%;diplay:inline;float:left;']);
            $this->renderPartial('_invite_stop_form',array('data'=>$data,'next_option'=>$next_option,'model'=>$model));
            echo CHtml::closeTag('div');
            ?>
        </div>
    </div>
</div>
