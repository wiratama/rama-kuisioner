<?php
class BackendUserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
    {       
        $username = $this->username;
		$backendUser = Admin::model()->find('email=:username',
			array(
			  ':username'=>$this->username
			)
		);
        
        if($backendUser===null) {
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if ($backendUser->oldPassword!=$backendUser->validatePassword($this->password)) {
		    $this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else {
			$this->_id = $backendUser->id;
			$this->username = $backendUser->email;	
			$this->errorCode = self::ERROR_NONE;
		}		
		return $this->errorCode == self::ERROR_NONE;
    }
	
	public function getId()
	{
		return $this->_id;
	}
}