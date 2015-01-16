<?php

class Container {
	
	protected $objects = array();
	
	/*
	// get object from the container
	// return: success - object, failure - false
	*/
	
	public function get($obj, $constructor = false, $di = false) {
		
		if($constructor == false) {
			
			$constructor = $this->objects[$obj]["constructor"];
			
		}
		
		if($di == false) {
			
			$di = $this->objects[$obj]["di"];
			
		}
		
		//Check if the object being requested has not been registered, and return false
		if(empty($this->objects[$obj])) {
			
			return false;
			
		}
		
		//Set the object up and return it
		$class = new ReflectionClass($obj);
		$object = $class->newInstanceArgs($constructor);
		
		if($di != false) {
			
			call_user_func_array($di, array($object));
			
		}
		
		return $object;
		
	}
	
	/*
	// register an object to make it usable in the container
	// return: success - true, failure - false
	*/
	
	public function register($obj, $constructor = array(), $di = false) {
		
		//Check if this object has already been registered, if it has then return false
		if(!empty($this->objects[$obj])) {
			
			return false;
			
		}
		
		$this->objects[$obj]["di"] = $di;
		$this->objects[$obj]["constructor"] = $constructor;
		return true;
		
	}
	
}

?>