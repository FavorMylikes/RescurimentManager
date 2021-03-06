<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<script>less = {env: 'development'}</script>
	<!-- dev use --><link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/less/bootstrap.less">
	<!-- dev use --><script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/css/less/other/less.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page" style="border:0px">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
        <?php if(in_array(Yii::app()->user->isAdmin(),[1,2,3,4]))
            $this->renderPartial('//layouts/_menu_admin');
        else
            $this->renderPartial('//layouts/_menu_guest');
        ?>
	</div><!-- mainmenu -->
	<!-- Flash 通知信息 -->
	<?php $this->renderPartial('//layouts/_flash_messages');?>
	<?php echo $content; ?>
	<div class="clear"></div>

    <?php $this->widget('booster.widgets.TbNavbar',array(
			'fixed'=>'bottom',
			'brandUrl' => 'http://www.tingyun.com',
			'brand'=>'Copyright &copy; 2015 by NetWorkBench',
			'items'=>array(
                '<a class="pull-right label label-info" href="http://www.zhihu.com/people/Mylikes-82" style="margin:15px 0px;">最爱麦丽素</a>',
                $this->widget('booster.widgets.TbLabel', array('context'=>'default:', 'label'=>'技术支持','htmlOptions'=>array('class'=>'pull-right','style'=>'color:#777;margin:15px 0px;')),$captureOutput=true),
			)
    	)
	); ?>

</div><!-- page -->

</body>
</html>
