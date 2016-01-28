<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $user=array(
		// username => password
		'admin'=>'favormylikes',
	);
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users=$this->user;
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			return !$this->errorCode;
		}elseif($users[$this->username]==$this->password){
			Yii::app()->user->setAdmin(1);
			$this->errorCode=self::ERROR_NONE;
			return !self::ERROR_NONE;
		}
		$user=User::model()->findByAttributes(array('user_name'=>$this->username));
		if(empty($user)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif($user->user_pass!=$this->password){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			Yii::app()->user->setAdmin($user->isAdmin);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}