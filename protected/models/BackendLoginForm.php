<?php
class BackendLoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;

    private $_identity;

	public function rules()
    {
        return array(
            // username and password are required
            array('username, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate', 'skipOnError'=>true),
        );
    }

	public function attributeLabels()
    {
        return array(
            'rememberMe'=>'Remember me next time',
        );
    }

    public function authenticate($attribute,$params)
    {
        $this->_identity = new BackendUserIdentity($this->username,$this->password);
        if(!$this->_identity->authenticate())
		{
			if ($this->_identity->errorCode===BackendUserIdentity::ERROR_USERNAME_INVALID) {
				$this->addError('username', 'Incorrect Username.');
				$this->addError('password', '');
			} else if ($this->_identity->errorCode===BackendUserIdentity::ERROR_PASSWORD_INVALID) {
				$this->addError('username', '');
				$this->addError('password', 'Incorrect Password.');
			} else {
				$this->addError('username', 'Incorrect Login Details.');
				$this->addError('password', 'Incorrect Login Details.');
			}
			// $this->addError('password','Incorrect username or password.');
		}
    }

    public function login()
    {
        if($this->_identity === null)
        {
            $this->_identity = new BackendUserIdentity($this->username,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->backendUser->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }
}
