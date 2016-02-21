<?php

/**
 * This is the model class for table "user_info".
 *
 */
class TalentInfo extends CActiveRecord
{

    public $recruitmentProcess;
    public $recruitmentNext;
    public static $intern=[68];
	/**
	* Returns the static model of the specified AR class.
	* @param string $className active record class name.
	* @return UserInfo the static model class
	*/
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{talent_info}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('qq_number,email,mobile_telephone_number,','filter', 'filter' => 'trim'),
			array('name,age,work_age,gender,recruitment_type,way,mobile_telephone_number,email,department_id,position','required','message'=>'{attribute}不能为空'),
            array('email','email'),
            array('mobile_telephone_number,qq_number','unique','message'=>'存在同号的人'),
            array('mobile_telephone_number','length','is'=>11,'message'=>'请输入正确的手机号码'),
            array('qq_number','length','min'=>5,'max'=>12,'tooShort'=>'哪有这么短的QQ','tooLong'=>'哪有这么长的QQ',),
            array('age','numerical','integerOnly'=>true,'max'=>70,'min'=>18,'tooBig'=>'年龄太大','tooSmall'=>'不用童工'),
            array('mobile_telephone_number,qq_number','numerical','integerOnly'=>true,'message'=>'只接受数字'),
			array('invite_user_id,vocational_certificate,status,experience_education,experience_work,experience_project,remarks,recruitment_source,marriage,invite_datetime,create_user_id','safe'),

		);
	}
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'options' => array(self::BELONGS_TO, 'Options', 'status'),
            'departments'=>array(self::BELONGS_TO, 'Departments','department_id'),
            'recruitment_types'=>array(self::BELONGS_TO, 'RecruitmentType', 'recruitment_type'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
    {
        return array(
            'name' => '姓名',
            'age' => '年龄',
            'work_age'=>'工龄',
            'gender' => '性别',
            'mobile_telephone_number' => '手机号码',
            'email' => '电子邮箱',
            'qq_number' => 'QQ号',
            'way'=>'招聘方式',

            'marriage' => '婚姻状况',
            'experience_education' => '教育经历',
            'experience_work' => '工作经历',
            'vocational_certificate' => '职业证书',

            'recruitment_type' => '招聘种类',
            'recruitment_source' => '招聘来源',
            'remarks'=>'备注',
            'experience_project'=>'项目经验',
            'recruitment_process'=>'招聘进度',

            'update_time'=>'更新时间',
            'invite_datetime'=>'上一次邀请时间',
            'create_datetime'=>'创建时间',

            'department_id'=>'部门',
            'position'=>'职位',

            'reason'=>'邀请不成功的原因',
        );
    }
    public function all($pageSize=20){
        $criteria=new CDbCriteria;
        $criteria->select=' * ';
        $criteria->with=array('options','departments');
        $criteria->order='update_time desc';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize,
            )
        ));
    }
    //查找所有未邀请的人和已经离职的人和终止面试的人
    public function notInProcess($pageSize=20,$onlyself=0){
        $criteria=new CDbCriteria;
        $criteria->select=' * ';
        $criteria->addNotInCondition('status',[1,2,3,4,5]);
        $criteria->with=array('options','departments');
        $criteria->order='update_time desc';
        $this->doIsIntern($criteria);//如果是实习生只能看自己的
        $criteria->compare('name',$this->name,true);
        $criteria->compare('age',$this->age,true);
        $criteria->compare('work_age',$this->work_age,true);
        $criteria->compare('gender',$this->gender,true);
        $criteria->compare('mobile_telephone_number',$this->mobile_telephone_number,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('qq_number',$this->qq_number,true);

        $criteria->compare('marriage',$this->marriage,true);
        $criteria->compare('experience_education',$this->experience_education,true);
        $criteria->compare('experience_work',$this->experience_work,true);
        $criteria->compare('vocational_certificate',$this->vocational_certificate,true);

        $criteria->compare('recruitment_type',$this->recruitment_type,true);
        $criteria->compare('recruitment_source',$this->recruitment_source,true);
        $criteria->compare('remarks',$this->remarks,true);

        $criteria->compare('position',$this->position,true);
        if($onlyself==1){
            $this->lookOnlySelf($criteria);
        }
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize,
            )
        ));
    }

    //查找所有邀请过的人
    public function inProcess($pageSize=20,$onlyself=0){
        $criteria=new CDbCriteria;
        $criteria->select=' * ';
        $criteria->addInCondition('status',[1,2,3,4,5]);
        $criteria->with=array('options','departments');
        $criteria->order='update_time desc';
        $this->doIsIntern($criteria);//如果是实习生只能看自己的
        $criteria->compare('name',$this->name,true);
        $criteria->compare('age',$this->age,true);
        $criteria->compare('work_age',$this->work_age,true);
        $criteria->compare('gender',$this->gender,true);
        $criteria->compare('mobile_telephone_number',$this->mobile_telephone_number,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('qq_number',$this->qq_number,true);

        $criteria->compare('marriage',$this->marriage,true);
        $criteria->compare('experience_education',$this->experience_education,true);
        $criteria->compare('experience_work',$this->experience_work,true);
        $criteria->compare('vocational_certificate',$this->vocational_certificate,true);

        $criteria->compare('recruitment_type',$this->recruitment_type,true);
        $criteria->compare('recruitment_source',$this->recruitment_source,true);
        $criteria->compare('remarks',$this->remarks,true);

        $criteria->compare('position',$this->position,true);

        if($onlyself==1){
            $this->lookOnlySelf($criteria);
        }
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize,
            )
        ));
    }

	public function search($pageSize=20,$keyword='')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

        $conditions_is = array();
        $conditions_rlike = array();
        $attributes_is=array('age','work_age','gender','mobile_telephone_number','qq_number','marriage');
        $attributes_rlike=array('name','email','experience_education','experience_work','vocational_certificate','recruitment_type','recruitment_source','remarks','position','departments.department');
        foreach($attributes_is as $index=>$attribute){
            $attr=$this->getAttribute($attribute);
            $conditions_is[] = " $attribute rlike :is ";
            $conditions_rlike[] = " $attribute like '%$attr%' ";
        }
        foreach($attributes_rlike as $index=>$attribute){
            $attr=$this->getAttribute($attribute);
            $conditions_is[] = " $attribute like :like ";
            $conditions_rlike[] = " $attribute like '%$attr%' ";
        }
        $condition_is = implode(" or ", $conditions_is);
        $condition_rlike = implode(" and ", $conditions_rlike);
        $condition_ext="true ";
        if($intern_id=$this->isIntern()){
            $condition_ext=$condition_ext.'and '."$this->create_user_id=$intern_id";
        }
        $criteria=new CDbCriteria(array(
            'condition'=>'('.$condition_is.')and('.$condition_rlike.')and('.$condition_ext.')',
            'params'=>array(':is'=>"^$keyword$",':like'=>"%$keyword%"),
            'order'=>'update_time desc',
        ));
        $criteria->addNotInCondition('status',[1,2,3,4,5]);
        $criteria->with=array('options','departments');
        return $dataProvider=new CActiveDataProvider('TalentInfo',array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize,
            )));
	}
    //返回招聘渠道种类
    public function getRecruitmentType(){

        $model=RecruitmentType::model()->findAll();
        $result=CHtml::listData($model,'id','type');
        return array_values($result);
    }
    //返回招聘渠道
    public function getRecruitmentSource(){
        if($this->recruitment_type==3){
            return UserInfo::model()->getUserNames();
        }
        $model=RecruitmentSource::model()->findAllByAttributes(array('type'=>$this->recruitment_type));
        $result=CHtml::listData($model,'id','source');
        return array_values($result);
    }
    //返回岗位
    public function getDepartments(){
        $model=Departments::model()->findAll();
        $result=CHtml::listData($model,'id','department');
        return array_values($result);
    }
    //返回招聘渠道
    public function getPositions(){
        $model=Positions::model()->findAllByAttributes(array('department_id'=>$this->department_id));
        $result=CHtml::listData($model,'id','position');
        return array_values($result);
    }

	public function getContactRecord($pageSize=20){
		return ContactRecord::model()->search($this->id,$pageSize);
	}
    public function doIsIntern(&$criteria){//如果是实习生就只能看自己录的
        $user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
        if(!empty($user)){
            if( in_array($user->id,$this::$intern)){
                $criteria->compare('create_user_id',$user->id);
            }
        }
    }
    public function lookOnlySelf(&$criteria){//选择只看自己录的
        $user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
        if(!empty($user)){
            $criteria->compare('create_user_id',$user->id);
        }else{
            $criteria->compare('create_user_id',0);
        }
    }
    public function isIntern(){//是否实习生
        $user=User::model()->findByAttributes(array('user_name'=>Yii::app()->user->name));
        if(!empty($user)){
            if( in_array($user->id,$this::$intern)){
                return $user->id;
            }else
                return false;
        }
        return false;
    }
}