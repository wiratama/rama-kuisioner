<?php
class EWebUser extends CWebUser{
 
    protected $_model;
 
    function getLevel()
    {
        $backendUser=$this->loadUser();
		if(!empty($backendUser)) {
			if('empty'==$backendUser->level) {
				return null;
			}
			else {
				return $backendUser->level;
			}
		}
		else {
			return null;
		}
    }
	
	protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = Admin::model()->findByPk($this->id);
        }
        return $this->_model;
    }
}