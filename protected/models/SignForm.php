<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
            array('username', 'unique'),
            array('password', 'length','max'=>16),
			array('password2', 'compare', 'compareAttribute'=>'password', 'message'=>'两次 密码 不一致'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
        return array(
            'username'=>Yii::t('app','用户名'),
            'password'=>Yii::t('app','密码'),
			'password2'=>Yii::t('app','重复密码'),
        );
	}

	/**
	 * @return bool
	 * 检查数据库中是否有相同的用户名
	 */
	public function check()
	{
		$user=UserInfo::model()->findByAttributes(array('user_name'=>$this->username));
		if(empty($user)){
			return true;
		}else{
			return false;
		}
	}
}
