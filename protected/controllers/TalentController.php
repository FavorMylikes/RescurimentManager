<?php

class TalentController extends Controller
{
	public $layout='//layouts/column1';
	public $keyword;
    public $cell_colors=['9'=>['fill'=>'FFBDD7EE','font'=>'FF2F7585'],'26'=>['fill'=>'FFFFC7CE','font'=>'FF9C0006'],'68'=>['fill'=>'FFC6EFCE','font'=>'FF006100']];

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','search','update','contact','recruitmentSource','manager','recruitmentProcessFile','information','recruitmentProcess','certificate','addTalent','departments'),
				'users'=>array('@'),
				'expression'=>'in_array($user->isAdmin(),[1,3,4])',
			),
			array('allow',
				'actions'=>array('error'),
				'users'=>array('*'),
			),
			array('deny',
				'users'=>array('*'),
			)
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
//        $objectPHPExcel = new PHPExcel();
//        $objectPHPExcel->setActiveSheetIndex(0);
//
////        ob_end_clean();
////        ob_start();
//        header('Content-Type : application/vnd.ms-excel');
//        header('Content-Disposition:attachment;filename="'.'xiaoqiang-'.'.xls"');
//        $objWriter= PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
//        $objWriter->save('php://output');
        $this->render('index', array('model' => TalentInfo::model()));
    }

    public function actionRecruitmentProcessFile(){
        $objectPHPExcel = new PHPExcel();
        $activeSheet=$objectPHPExcel->setActiveSheetIndex(0);
        $criteria=new CDbCriteria;
        $criteria->select=' * ';
        $criteria->addInCondition('status',[1,2,3,4,5,6]);
        $criteria->with=array('options','departments','recruitment_types');
        $criteria->order='update_time desc';
        $models=TalentInfo::model()->findAll($criteria);
        $activeSheet->setCellValue('U2','张微');
        $activeSheet->setCellValue('U3','那子卓');
        $activeSheet->setCellValue('U4','张敏');
        $color=$this->getColorById("26");
        $this-> setCellColor($activeSheet,'V2',$color);
        $color=$this->getColorById("68");
        $this-> setCellColor($activeSheet,'V3',$color);
        $color=$this->getColorById("9");
        $this-> setCellColor($activeSheet,'V4',$color);


        $activeSheet->setCellValue('A1','部门');
        $activeSheet->setCellValue('B1','岗位');
        $activeSheet->setCellValue('C1','姓名');

        $activeSheet->setCellValue('D1','招聘种类');
        $activeSheet->setCellValue('E1','招聘渠道');
        $activeSheet->setCellValue('F1','招聘方式');
        $activeSheet->setCellValue('G1','创建时间');
        $activeSheet->setCellValue('H1','最后一次邀请时间');

        $activeSheet->setCellValue('I1','初试未到原因');
        $activeSheet->setCellValue('J1','初试人');
        $activeSheet->setCellValue('K1','初试时间');
        $activeSheet->setCellValue('L1','初试未通过原因');

        $activeSheet->setCellValue('M1','复试未到原因');
        $activeSheet->setCellValue('N1','复试人');
        $activeSheet->setCellValue('O1','复试时间');
        $activeSheet->setCellValue('P1','复试未通过原因');

        $activeSheet->setCellValue('Q1','到岗时间');
        $activeSheet->setCellValue('R1','未到岗原因');
        $activeSheet->setCellValue('S1','是否录取');

        $criteria_opt_user=[];
//        $option_user_model=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));

        foreach($models as $r=>$model){
            $row=$r+2;
            $activeSheet->setCellValue('A'.$row,$model->departments->department);
            $activeSheet->setCellValue('B'.$row,$model->position);
            $activeSheet->setCellValue('C'.$row,$model->name);

            $activeSheet->setCellValue('D'.$row,$model->recruitment_types->type);
            $activeSheet->setCellValue('E'.$row,$model->recruitment_source);
            $activeSheet->setCellValue('F'.$row,$model->way);
            $activeSheet->setCellValue('G'.$row,$model->create_datetime);
            $activeSheet->setCellValue('H'.$row,$model->invite_datetime);
            $color=$this->getColorById($model->create_user_id);
            $this->setCellColor($activeSheet,'A'.$row.':G'.$row,$color);
            $talent_id=$model->id;
            $criteria_opt_user['talent_id']=$talent_id;
            $criteria_opt_user['status']=1;
            $talent_status_first=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_first)){
                $activeSheet->setCellValue('I'.$row,$talent_status_first->opt_details);
                $color=$this->getColorById(isset($talent_status_first->opt_user_id)?$talent_status_first->opt_user_id:0);
                $this->setCellColor($activeSheet,'H'.$row.':I'.$row,$color);
            }
            $criteria_opt_user['status']=2;
            $talent_status_first_get=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_first_get)){
                $activeSheet->setCellValue('J'.$row,$talent_status_first_get->middleman);
                $activeSheet->setCellValue('K'.$row,$talent_status_first_get->setup_datetime);
                $activeSheet->setCellValue('L'.$row,$talent_status_first_get->opt_details);
                $color=$this->getColorById(isset($talent_status_first_get->opt_user_id)?$talent_status_first_get->opt_user_id:0);
                $this-> setCellColor($activeSheet,'J'.$row.':L'.$row,$color);
            }
            $criteria_opt_user['status']=3;
            $talent_status_second=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_second)){
                $activeSheet->setCellValue('M'.$row,$talent_status_second->opt_details);
                $color=$this->getColorById(isset($talent_status_second->opt_user_id)?$talent_status_second->opt_user_id:0);
                $this-> setCellColor($activeSheet,'M'.$row.':M'.$row,$color);
            }
            $criteria_opt_user['status']=4;
            $talent_status_second_get=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_second_get)){
                $activeSheet->setCellValue('N'.$row,$talent_status_second_get->middleman);
                $activeSheet->setCellValue('O'.$row,$talent_status_second_get->setup_datetime);
                $activeSheet->setCellValue('P'.$row,$talent_status_second_get->opt_details);
                $color=$this->getColorById(isset($talent_status_second_get->opt_user_id)?$talent_status_second_get->opt_user_id:0);
                $this->setCellColor($activeSheet,'N'.$row.':P'.$row,$color);
            }
            $criteria_opt_user['status']=5;
            $talent_status_enroll=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_enroll)){
                $activeSheet->setCellValue('Q'.$row,$talent_status_enroll->setup_datetime);
                $activeSheet->setCellValue('R'.$row,$talent_status_enroll->opt_details);
                $color=$this->getColorById(isset($talent_status_enroll->opt_user_id)?$talent_status_enroll->opt_user_id:0);
                $this-> setCellColor($activeSheet,'Q'.$row.':R'.$row,$color);
            }
            $criteria_opt_user['status']=6;
            $talent_status_enroll_get=TalentStatus::model()->findByAttributes($criteria_opt_user);
            if(!empty($talent_status_enroll_get)){
                $activeSheet->setCellValue('S'.$row,'是');
                $color=$this->getColorById(isset($talent_status_enroll_get->opt_user_id)?$talent_status_enroll_get->opt_user_id:0);
                $this-> setCellColor($activeSheet,'S'.$row.':S'.$row,$color);
            }
            //设置颜色和字体颜色区分操作人

        }
        ob_end_clean();
        ob_start();
        header('Content-Type : application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename="'.'招聘进度'.'.xls"');
        $objWriter= PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
        $objWriter->save('php://output');
    }
    public function setCellColor($activeSheet,$position,$color){
        $activeSheet->getStyle( $position)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $activeSheet->getStyle( $position)->getFill()->getStartColor()->setARGB($color[0]);
        $activeSheet->getStyle( $position)->getFont()->setColor(new PHPExcel_Style_Color($color[1]));
    }

    public function actionAddTalent(){
        if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
        {
            $talent_info=new TalentInfo();
            echo CActiveForm::validate($talent_info);
            Yii::app()->end();
        }
        if(isset($_POST['TalentInfo'])){
            $model=new TalentInfo();
            $model->attributes=$_POST['TalentInfo'];
            $model->unsetAttributes(['update_time']);
            $model->unsetAttributes(['create_datetime']);
            $create_user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
            if(!empty($create_user)){
                $model->create_user_id=$create_user->id;
            }else{
                $model->create_user_id=0;
            }
            if($model->save()){
                Yii::app()->user->setFlash('success', '添加成功');
            }else{
                Yii::app()->user->setFlash('error', '添加失败');
            }
        }else{
            $model=new TalentInfo();//如果reander直接用model的话，可以看到错误信息
        }
        $this->render('information', array('model' =>$model));
    }

    //返回下拉列表联动的js数组字符串---------招聘来源
    public function actionRecruitmentSource(){
        $recruitment_type=$_POST['TalentInfo']['recruitment_type'];
        if($recruitment_type==3){
            $model=UserInfo::model()->findAll();
            $result=CHtml::listData($model,'id','name');
        }else{
            $source=RecruitmentSource::model()->findAllByAttributes(array('type'=>$recruitment_type));
            $result=CHtml::listData($source,'id','source');
        }
        $result=array_values($result);
        echo json_encode($result);
    }
    //返回下拉列表联动的js数组字符串---------岗位
    public function actionDepartments(){
        $department_id=$_POST['TalentInfo']['department_id'];
        $positions=Positions::model()->findAllByAttributes(array('department_id'=>$department_id));
        $result=CHtml::listData($positions,'id','position');
        $result=array_values($result);
        echo json_encode($result);
    }

    public function actionManager($onlyself=-1){
        if(isset($_POST['TalentStatus'])){
            $model=new TalentStatus();
            $model->attributes=$_POST['TalentStatus'];
            $model->unsetAttributes(['update_time']);//防止默认的更新时间变为字符串
            $model->status=9;
            $option_user_model=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
            if(!empty($option_user_model)){
                $model->opt_user_id=$option_user_model->id;
            }else{
                $model->opt_user_id=0;
            }
            TalentStatus::model()->deleteAllByAttributes(['talent_id'=>$model->talent_id]);
            if($model->save()){
                $talent=TalentInfo::model()->findByPk($model->talent_id);
                $talent->status=$model->status;
                $talent->update_time=date('Y-m-d h:i:s');
                $talent->update(['update_time','status']);
            }else{
                Yii::app()->user->setFlash('error', '状态更改出错');
            }
        }
        $model=new TalentInfo('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TalentInfo']))
            $model->attributes=$_GET['TalentInfo'];
        $vdataProvider=$model->notInProcess(30,$onlyself);
        $this->render('manager', array('dataProvider'=>$vdataProvider,'model' => $model,'onlyself'=>$onlyself));
    }

    public function actionRecruitmentProcess($onlyself=-1){
        if(isset($_POST['TalentStatus'])) {
            $model = new TalentStatus();
            $model->attributes = $_POST['TalentStatus'];
            $model->unsetAttributes(['update_time']);//防止默认的更新时间变为字符串
            $model->status = $_POST['TalentStatus']['next_option_id'];
            $talent = TalentInfo::model()->findByPk($model->talent_id);
            if($talent->status!=$model->status) {
                $option_user_model = User::model()->findByAttributes(array('user_name' => Yii::app()->user->name));
                if (!empty($option_user_model)) {
                    $model->opt_user_id = $option_user_model->id;
                } else {
                    $model->opt_user_id = 0;
                }
                if ($model->save()) {
                    $talent_status_old = TalentStatus::model()->findByAttributes(['talent_id' => $model->talent_id, 'status' => $talent->status]);
                    $talent_status_old->opt_details = $model->opt_details;
                    $talent_status_old->update(['opt_details']);
                    $talent->status = $model->status;
                    $talent->save();
                    Yii::app()->user->setFlash('success', '更改成功');
                } else {
                    Yii::app()->user->setFlash('error', '更改失败');
                }
            }
        }
        //下面四行是搜索用的
        $model=new TalentInfo('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TalentInfo']))
            $model->attributes=$_GET['TalentInfo'];
        $this->render('recruitmentProcess', array('model' =>$model ,'onlyself'=>$onlyself));
    }
    public function actionInformation($id){
        if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
        {
            $talent_info=new TalentInfo();
            echo CActiveForm::validate($talent_info);
            Yii::app()->end();
        }
        if(isset($_POST['TalentInfo'])){
            $model=TalentInfo::model()->findByPk($id);
            $model->attributes=$_POST['TalentInfo'];
            $create_user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
            if(!empty($create_user)){
                $model->create_user_id=$create_user->id;
            }else{
                $model->create_user_id=0;
            }
            $type=$model->recruitment_type;
            $source=$model->recruitment_source;
            $department_id=$model->department_id;
            $position=$model->position;
            $department_position=Positions::model()->findByAttributes(array('department_id'=>$department_id,'position'=>$position));
            $type_source=RecruitmentSource::model()->findAllByAttributes(array('type'=>$type,'source'=>$source));
            if(empty($type_source)&&!empty($source)){
                $model_recruitment_source=new RecruitmentSource();
                $model_recruitment_source->type=$type;
                $model_recruitment_source->source=$source;
                $model_recruitment_source->save();
            }
            if(empty($department_position)&&!empty($position)){
                $model_department_position=new Positions();
                $model_department_position->department_id=$department_id;
                $model_department_position->position=$position;
                $model_department_position->save();
            }
            if($model->save()){
                Yii::app()->user->setFlash('success', '更改成功');
            }else{

            }
            $this->render('information', array('model' => $model));
        }else{
            $this->render('information', array('model' => TalentInfo::model()->findByPk($id)));
        }


    }

	public function actionSearch($keyword='',$onlyself=-1){
        $this->keyword=$keyword;
        $model=new TalentInfo('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TalentInfo']))
            $model->attributes=$_GET['TalentInfo'];
        $dataProvider=$model->search(30,$keyword);
		$this->render('manager',array('dataProvider'=>$dataProvider,'model'=>$model,'onlyself'=>$onlyself));
	}

	public function actionUpdate(){
		// if it is ajax validation request

		if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
		{
			$talent_info=new TalentInfo();
			echo CActiveForm::validate($talent_info);
			Yii::app()->end();
		}
		if(isset($_POST['TalentInfo'])){
			$talent_info=TalentInfo::model()->findByPk($_POST['TalentInfo']['id']);
			$talent_info->attributes=$_POST['TalentInfo'];
			unset($talent_info->id);
			if($talent_info->update()){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	public function actionContact(){
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			$model=new ContactRecord();
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(Yii::app()->request->isAjaxRequest){
			$contact_record=new ContactRecord();
			$id=$_POST['id'];
			$contact_record->user_id=$id;
			$contact_record->content=Yii::app()->user->name.':'.$_POST['postContact'];;
			$contact_record->time=date('y-m-d h:i');
			if($contact_record->save()){
				$this->renderPartial('_info_contact',array('dataProvider'=>$contact_record->search($id),'id'=>$id));
			}
		}
	}

    public function actionCertificate($id)
    {
        $talent_info=TalentInfo::model()->findByPk($id);
        $talent_info->status=1;
        $talent_info->invite_datetime=date('Y-m-d h:i:s');
        $invite_user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
        if(!empty($invite_user)){
            $talent_info->invite_user_id=$invite_user->id;
        }else{
            $talent_info->invite_user_id=0;
        }
        if($talent_info->save()) {
            TalentStatus::model()->deleteAllByAttributes(['talent_id'=>$id]);
            $talent_status = new TalentStatus();
            $talent_status->talent_id = $id;
            $talent_status->status=1;
            $talent_status->unsetAttributes(['update_time']);

            if(!empty($invite_user)){
                $talent_status->opt_user_id=$invite_user->id;
            }else{
                $talent_status->opt_user_id=0;
            }
            $talent_status->save();
            Yii::app()->user->setFlash('success', '邀请记录已生成');
        }
        else
            Yii::app()->user->setFlash('error','邀请失败');
        $this->redirect(array('/talent/manager'));
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
			else
				$this->render('error', $error);
		}
	}
    //返回个人信息主页
    public function getUserUrl($data){
        $url=$this->createUrl('information',array("id"=>$data->id));
        return CHtml::link($data->name,$url,array('data-toggle'=>"tooltip",'data-placement'=>"top",'title'=>$data->remarks));
    }
    public function getRecruitmentProcess($data){
        $talent_id=$data->id;
        $criteria = new CDbCriteria();
        $criteria->compare('talent_id',$talent_id);
        $criteria->with='process';
        $criteria->order='update_time asc';
        $models=TalentStatus::model()->findAll($criteria);
        //$result=CHtml::listData($model,'id','process.opt');
        $html=[];
        foreach($models as $model){
            if(empty($model->middleman)||empty($model->setup_datetime)){
                $ext_html='';
            }else{
                $time = strtotime($model->setup_datetime);
                $ext_html='('.$model->middleman.','.date("m-d H:i",$time).')';
            }
            $html[]=CHtml::value($model,'process.opt').$ext_html;
        }
        $this->renderPartial('_recruitmentProcess',array('html'=>$html));
        return '';//这里是为了防止出现默认的空格
    }

    public function getCallStopReasoon($data){
        $criteria=new CDbCriteria;
        $criteria->select='*';
        $criteria->order='update_time desc';
        $criteria->compare('talent_id',$data->id);
        $model=TalentStatus::model()->find($criteria);
        if(empty($model)){
            $model=TalentStatus::model();
        }
        $this->renderPartial('_call_stop_form',array('data'=>$data,'model'=>$model));
        return '';//这里是为了防止出现默认的空格，如果返回点啥，表格会认为这里应该有个空格，你render之后又给你加个空格就不好了
    }
    public function getRecruitmentNextProcess($data){
        $status=$data->status;
        $model=Options::model();
        $raw=$model->with('options')->findByAttributes(array('id'=>$status));
        $next_opt=$raw->getRelated('options');
        $this->renderPartial('_carousel_form',array('data'=>$data,'next_option'=>$next_opt,'model'=>TalentStatus::model()));
        return '';//这里是为了防止出现默认的空格,如果不返回
    }
    public function getColorById($id){
        if(!empty($this->cell_colors["$id"])){
            $fill=$this->cell_colors["$id"]['fill'];
            $font=$this->cell_colors["$id"]['font'];
        }else{
            $fill='FFFFFFFF';
            $font='FF000000';
        }
        return [$fill,$font];
    }
}