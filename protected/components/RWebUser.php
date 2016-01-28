<?php
/**
* Rights web user class file.
*
* @author Christoffer Niska <cniska@live.com>
* @copyright Copyright &copy; 2010 Christoffer Niska
* @since 0.5
*/
class RWebUser extends CWebUser
{
	/**
	 * @var string|array the URL for login. If using array, the first element should be
	 * the route to the login action, and the rest name-value pairs are GET parameters
	 * to construct the login URL (e.g. array('/site/login')). If this property is null,
	 * a 403 HTTP exception will be raised instead.
	 * @see CController::createUrl
	 */
	public $loginUrl=array('/site/index');
	public function isAdmin(){
		return $this->getState('isAdmin');
	}
	public function setAdmin($state){
		$this->setState('isAdmin', $state);
	}
}