<?php
/**
 * Created by PhpStorm.
 * User: l7861
 * Date: 2016/1/15
 * Time: 14:35
 */
?>
<?php

foreach($html as $row){
    $this->renderPartial('_recruitmentProcess_item',array('text'=>$row));
}
?>
