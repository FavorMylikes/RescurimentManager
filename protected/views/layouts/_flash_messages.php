<!-- flash信息 -->
<div class="container" style="background-color: #fff;">
    <?php
    $flashMessages = Yii::app()->user->getFlashes();

    if($flashMessages)
    {
        //输出flash
        echo '<ul class="flashes" style="padding-right: 21px;margin-right: 21px;">';
        foreach($flashMessages as $key => $message) {
            echo '<li ><div  class="flash-' . $key . '">' . $message . "</div></li>\n";
        }
        echo '</ul>';

        //动画效果
        Yii::app()->clientScript->registerScript(
            'myHideEffect',
            '$(".flashes").animate({opacity: 1.0}, 2000).fadeOut("slow");',
            CClientScript::POS_READY
        );
    }
    ?>
</div>
