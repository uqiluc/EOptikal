<?php
class WebUser extends CWebUser{
	private $_model;
	
	private function loadModel()
	{
		if($this->_model==null)
		{
			$this->_model=Pengguna::model()->findByPk($this->id);
		}
		return $this->_model;
	}
		
	public function getLevel()
	{
		$user=$this->loadModel();
		if($user)
			return $user->level;
		return 100;
	}

	public function getBagian()
	{
		$user=$this->loadModel();
		if($user)
			return $user->part_id;
		return 100;
	}
}
	
?>