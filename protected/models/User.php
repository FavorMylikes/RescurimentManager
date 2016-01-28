<?php

/**
 * This is the model class for table "user_info".
 *
 */
class User extends CActiveRecord
{

	public $user_pass2;
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name','unique','message'=>'用户名已存在'),
			array('user_name,user_pass,user_pass2', 'required'),
			array('user_pass,user_pass2', 'length','min'=>'6','max'=>16),
			array('user_pass2', 'compare', 'compareAttribute'=>'user_pass', 'message'=>'两次密码不一致'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => '用户名',
			'user_pass' =>'密码',
			'user_pass2' =>'再次输入密码',
		);
	}
}