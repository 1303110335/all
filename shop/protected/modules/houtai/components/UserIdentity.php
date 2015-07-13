<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		/* $users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		); */
        
		//验证用户名和密码的正确性
		//首先看看是否有次用户名存在
		//find()不存在则返回null
		//findAll()不存在则返回空数组
		$user_model = Manager::model()->find('username=:name',array(':name'=>$this->username));
		
		if($user_model === null){
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		    return false;
		}else if($user_model->password !== $this->password){
		    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		    return false;
		}else{
		    $this->errorCode=self::ERROR_NONE;
		    return true;
		}
		
		/* if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode; */
	}
}