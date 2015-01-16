<?php

include "Container69.php";

class Car {
	
	protected $make;
	protected $model;
	protected $colour;
	
	function __construct($make, $model) {
		
		$this->make = $make;
		$this->model = $model;
		
	}
	
	public function set_colour($colour) {
		
		$this->colour = $colour;
		
	}
	
	public function make_car() {
		
		return "
		Vehical Make: " . $this->make . "<br />
		Model: " . $this->model . "<br />
		With colour: " . $this->colour . "<br />
		Has been made!";
		
	}
	
}

$container = new Container;
$container->register("Car", array("Fiat", "Punto"), function($obj) {
	
	$obj->set_colour("Purple");
	
});

$my_car = $container->get("Car");
echo $my_car->make_car();

?>