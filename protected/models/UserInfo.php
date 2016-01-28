<?php

/**
 * This is the model class for table "user_info".
 *
 */
class UserInfo extends CActiveRecord
{
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
		return '{{user_info}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(//bank_name,bank_card_number,
			array('name,age,gender,birth_date,nation,origin,mobile_telephone_number,account_nature,marriage,registered_permanent_residence,id_number,education,
			professional,graduation_date,school_name,email,emergency_contact,emergency_contant_telephone_number,social_security_state,address,disease,
			university_school_name,university_education,university_professional,
			company1,department1,duties1,
			family_member_name1,family_member_relation1,family_member_company1,family_member_phone_number1'
            ,'required','message'=>'{attribute}不能为空'),
            array('university_start_date,university_end_date,work_start_date1,work_end_date1,','required','message'=>'请填写时间'),
            array('email','email'),
            array('mobile_telephone_number,emergency_contant_telephone_number,family_member_phone_number1,family_member_phone_number2','length','is'=>11,'message'=>'请输入正确的手机号码'),
            array('id_number','length','is'=>18),
            array('graduation_date,university_start_date,university_end_date,master_start_date,master_end_date,work_start_date1,work_end_date1,work_start_date2,work_end_date2','date','format'=>'yyyy-MM-dd'),
            array('birth_date','date','format'=>'yyyy-mm-dd'),
            array('age','numerical','integerOnly'=>true,'max'=>70,'min'=>18,'tooBig'=>'年龄太大','tooSmall'=>'不用童工'),
			array('company2,department2,duties2,family_member_name2,family_member_relation2,family_member_company2,master_school_name,master_education,master_professional','safe'),
            array('id_number','match','pattern'=>'/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/','message'=>'不是正确的身份证号码'),
			//array('bank_card_number','match','pattern'=>'/^(\d{16}$|^\d{19}$)$/','message'=>'请输入正确的银行卡号'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'姓名',
			'age'=>'年龄',
			'gender'=>'性别',
			'birth_date'=>'出生日期',
			'nation'=>'民族',
			'origin'=>'籍贯',
			'mobile_telephone_number'=>'手机号码',
			'account_nature'=>'户口性质',
			'marriage'=>'婚姻状况',
			'registered_permanent_residence'=>'现在的户口所在地',
			'id_number'=>'身份证',
			'education'=>'学历',
			'professional'=>'专业',
			'graduation_date'=>'毕业时间',
			'school_name'=>'毕业学校',
			'email'=>'电子邮箱',
			'emergency_contact'=>'紧急联系人姓名',
			'emergency_contant_telephone_number'=>'紧急联系人电话',
			'social_security_state'=>'社保情况',
			'address'=>'联系地址',
			'disease'=>'重大疾病',

			'university_start_date'=>'从',
			'university_end_date'=>'到',
			'university_school_name'=>'大学',
			'university_education'=>'学历',
			'university_professional'=>'专业',
			'master_start_date'=>'从',
			'master_end_date'=>'到',
			'master_school_name'=>'大学以上',
			'master_education'=>'学历',
			'master_professional'=>'专业',

			'work_start_date1'=>'从',
			'work_end_date1'=>'到',
			'company1'=>'单位一',
			'department1'=>'部门',
			'duties1'=>'职位',
			'work_start_date2'=>'从',
			'work_end_date2'=>'到',
			'company2'=>'单位二',
			'duties2'=>'职位',
			'department2'=>'部门',

			'family_member_name1'=>'姓名',
			'family_member_relation1'=>'关系',
			'family_member_company1'=>'单位',
			'family_member_phone_number1'=>'联系电话',
			'family_member_name2'=>'姓名',
			'family_member_relation2'=>'关系',
			'family_member_company2'=>'单位',
			'family_member_phone_number2'=>'联系电话',
			'bank_name'=>'银行名称',
			'bank_card_number'=>'银行卡号',
			'vocational_certificate'=>'职业证书',
		);
	}

	public function search($pageSize=20)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('origin',$this->origin,true);
		$criteria->compare('mobile_telephone_number',$this->mobile_telephone_number,true);
		$criteria->compare('account_nature',$this->account_nature,true);
		$criteria->compare('marriage',$this->marriage,true);
		$criteria->compare('registered_permanent_residence',$this->registered_permanent_residence,true);
		$criteria->compare('id_number',$this->id_number,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('professional',$this->professional,true);
		$criteria->compare('graduation_date',$this->graduation_date,true);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('emergency_contact',$this->emergency_contact,true);
		$criteria->compare('emergency_contant_telephone_number',$this->emergency_contant_telephone_number,true);
		$criteria->compare('social_security_state',$this->social_security_state,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('disease',$this->disease,true);

		$criteria->compare('university_start_date',$this->university_start_date,true);
		$criteria->compare('university_end_date',$this->university_end_date,true);
		$criteria->compare('university_school_name',$this->university_school_name,true);
		$criteria->compare('university_education',$this->university_education,true);
		$criteria->compare('university_professional',$this->university_professional,true);
		$criteria->compare('master_start_date',$this->master_start_date,true);
		$criteria->compare('master_end_date',$this->master_end_date,true);
		$criteria->compare('master_school_name',$this->master_school_name,true);
		$criteria->compare('master_education',$this->master_education,true);
		$criteria->compare('master_professional',$this->master_professional,true);

		$criteria->compare('work_start_date1',$this->work_start_date1,true);
		$criteria->compare('work_end_date1',$this->work_end_date1,true);
		$criteria->compare('company1',$this->company1,true);
		$criteria->compare('department1',$this->department1,true);
		$criteria->compare('duties1',$this->duties1,true);
		$criteria->compare('work_start_date2',$this->work_start_date2,true);
		$criteria->compare('work_end_date2',$this->work_end_date2,true);
		$criteria->compare('company2',$this->company2,true);
		$criteria->compare('duties2',$this->duties2,true);
		$criteria->compare('department2',$this->department2,true);

		$criteria->compare('family_member_name1',$this->family_member_name1,true);
		$criteria->compare('family_member_relation1',$this->family_member_relation1,true);
		$criteria->compare('family_member_company1',$this->family_member_company1,true);
		$criteria->compare('family_member_phone_number1',$this->family_member_phone_number1,true);
		$criteria->compare('family_member_name2',$this->family_member_name2,true);
		$criteria->compare('family_member_relation2',$this->family_member_relation2,true);
		$criteria->compare('family_member_company2',$this->family_member_company2,true);
		$criteria->compare('family_member_phone_number2',$this->family_member_phone_number2,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_card_number',$this->bank_card_number,true);
		$criteria->compare('vocational_certificate',$this->vocational_certificate,true);

		$criteria->order='status asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>$pageSize,
			)
		));
	}

	public function getUserNames(){
		$model=$this->findAll();
		$result=CHtml::listData($model,'id','name');
		$value=array_values($result);
		return array_combine($value,$value);
	}
}