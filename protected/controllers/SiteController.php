<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
	public function accessRules()
	{

		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('manager','undo','save','userInfoFile'),
				'users'=>array('@'),
				'expression'=>'in_array($user->isAdmin(),[1,2])',
			),
			array('allow',
				'users'=>array('@'),
				'actions'=>array('information'),
				),
			array('allow',
				'users'=>array('*'),
				'actions'=>array('error','login','logout','sign','index'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$message            = new YiiMailMessage;
		//this points to the file test.php inside the view path
		$message->view = "login";
		$params              = array('name'=>'favormylikes@163.com');
		$message->subject    = 'My TestSubject';
		$message->setBody($params, 'text/html');
		$message->addTo('786112323@qq.com');
		$message->from = 'favormylikes@163.com';
		Yii::app()->mail->send($message);

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$login_model=new LoginForm;
		$sign_model=new User;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($login_model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$login_model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($login_model->validate() && $login_model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('index',array('login_model'=>$login_model,'sign_model'=>$sign_model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				switch($error['code']){
					case 404:$error['message']='很抱歉，你来晚了一步，这页已经任性的消失了...你要坚强些，继续浏览别的页面吧~';break;
					case 403:$error['message']='很抱歉，你还没有跟管理员申请权限...你要勇敢些，去找管理员要权限吧~';break;
				}
				$this->render('error', $error);
			}

		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $login_model=new LoginForm;
        $sign_model=new User;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($login_model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$login_model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($login_model->validate() && $login_model->login()){
                if(in_array(Yii::app()->user->isAdmin(),[1,2]))
				{
					$this->redirect(array('site/manager'),$terminate=false);
				}
				elseif(in_array(Yii::app()->user->isAdmin(),[1,3,4]))
				{
					$this->redirect(array('talent/recruitmentProcess'),$terminate=false);
				}
                else {
                    $this->redirect(array('site/information'));
				}
            }else{
                $this->render('index',array('login_model'=>$login_model,'sign_model'=>$sign_model));
            }
//				$this->redirect(Yii::app()->user->returnUrl);//if you want return that url just soon then delete //
		}
	}

    /**
     * Displays the login page
     */
    public function actionSign()
    {
        $sign_model=new User;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sign-form') {
            echo CActiveForm::validate($sign_model);
            Yii::app()->end();
        }
        if(isset($_POST['User']))
        {
            $sign_model->attributes=$_POST['User'];
//            print_r($sign_model);
            // validate user input and redirect to the previous page if valid
            $user=new User;
            $user->attributes=$sign_model->attributes;
			$user->user_pass2=$sign_model->user_pass2;
            $user->isAdmin=0;
			if($user->save()){
                $identity=new UserIdentity($user->attributes['user_name'],$user->attributes['user_pass']);
                Yii::app()->user->login($identity,3600*24*2);
				Yii::app()->user->setFlash('success','注册成功');
				$this->redirect(array('site/information'));
			}else{
				Yii::app()->user->setFlash('error','注册失败');
			}
        }
        $login_model=new LoginForm();
        $this->render('index',array('login_model'=>$login_model,'sign_model'=>$sign_model));
    }

    /**
     * Displays the manager page
     */
    public function actionManager()
    {
		$model=new UserInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserInfo']))
			$model->attributes=$_GET['UserInfo'];
		$this->render('manager',array(
			'model'=>$model,
		));
    }

	public function actionUserInfoFile(){
		$objectPHPExcel = new PHPExcel();
		$activeSheet=$objectPHPExcel->setActiveSheetIndex(0);
		$models=UserInfo::model()->findAll();
		$labels=UserInfo::model()->attributeLabels();
		$col=0;
		$COL=[];
		for($i=0;$i<26;$i++){
			$COL[]=chr(ord('A')+$i);
		}
		for($i=0;$i<26;$i++){
			for($j=0;$j<26;$j++){
				$COL[]=chr(ord('A')+$i).chr(ord('A')+$j);
			}
		}

		foreach($labels as $c=>$label){
			$activeSheet->setCellValue($COL[$col].'1',$label);
			$col=$col+1;
		}
		$activeSheet->getStyle('K')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		foreach($models as $r=>$model){
			$row=$r+2;
			$col=0;
			foreach($labels as $c=>$label){
				$value=$model->$c;
				if($label=='身份证'){
					$value=$value.' ';//防止导出的excel中长数字后面变成0
				}
				$activeSheet->setCellValue($COL[$col].$row,$value);
				$col=$col+1;
			}
		}
		ob_end_clean();
		ob_start();
		header('Content-Type : application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="'.'员工信息'.'.xls"');
		$objWriter= PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
		$objWriter->save('php://output');
	}

    /**
     * Displays the login page
     */
    public function actionInformation($id=-1)
    {
		if($id==-1) {
			$user = User::model()->findByAttributes(array('user_name' => Yii::app()->user->name));
			if (!$user) {
				$this->redirect(array('/'));
			}
			$user_info = UserInfo::model()->findByPk($user->id);
			if (!$user_info) {
				$user_info = new UserInfo();
			}
			if (isset($_POST['UserInfo'])) {
				if(in_array(Yii::app()->user->isAdmin(),[4])){
					Yii::app()->user->setFlash('error', '无更改权限');
					$this->render('information', array('user_info' => $user_info));
				}
				$user_info->attributes = $_POST['UserInfo'];
				$user_info->vocational_certificate = $_POST['UserInfo']['vocational_certificate'];
				foreach ($user_info->attributes as $k => $v) {
					if (!strlen($v) && !$v)
						unset($user_info[$k]);
				}
				$user_info->id = $user->id;
				$user_info->ip = $_SERVER['REMOTE_ADDR'];
				if ($user_info->save()) {
					Yii::app()->user->setFlash('success', '更改成功');
				} else {
					Yii::app()->user->setFlash('error', '更改失败');
					$this->render('information', array('user_info' => $user_info));
					Yii::app()->end();
				}
			}
			$this->render('information', array('user_info' => $user_info));
		}else{
			if(Yii::app()->user->isAdmin()==0)
				$this->redirect(array('/site/index'));
			$user_info = UserInfo::model()->findByPk($id);
			$this->render('information', array('user_info' => $user_info));
		}
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionSave($id)
	{
		$user_info=UserInfo::model()->findByPk($id);
        $user_info->status=1;
        if($user_info->save())
            Yii::app()->user->setFlash('success','存档成功');
        else
            Yii::app()->user->setFlash('success','存档失败');
        $this->redirect(array('/site/manager'));
	}
    public function actionUndo($id)
    {
        $user_info=UserInfo::model()->findByPk($id);
        $user_info->status=0;
        if($user_info->save())
            Yii::app()->user->setFlash('success','撤销成功');
        else
            Yii::app()->user->setFlash('success','撤销失败');
        $this->redirect(array('/site/manager'));
    }
}