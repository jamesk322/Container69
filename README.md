# Container69
Low Budget, Dependency Injection Container. Suitable for all ages!<br />
Container69 for PHP is a really, really simple Dependency Injection Container / Inversion of Control Container <a href="http://code.tutsplus.com/tutorials/dependency-injection-huh--net-26903">(what is this?)</a>
<br /><br />

###How to work this magic
Include the file Cotainer69.php in your PHP script and initialize it
```php
include "Container69.php";
$container = new Container();
```
Before you can get an object from the container you must register it, to keep it real simple there is no automatic registry in Container69 this means if you want to use an object it has to have already been prepared for use with the register method.
```php
$container->register($class, $constructor_args, $dependency_function);
```
**$class** The class name to register<br />
**$constructor_args** *(optional)* Array of arguments that will be passed to the class constructor<br />
**$dependency_function** *(optional)* A simple lambda function so you can define post actions that can happen after the constructor has been called, for example use this to call a method that will be required
<br /><br />
Here's the old car example in action
```php
$container->register("Car", array("Fiat", "Punto"), function($obj) {
	
	$obj->set_colour("Purple");
	
});
```
Here we have a class called "Car" and the constructor for this class asks for two arguments, make and model. You can see this in action in the example above, the lambda function then calls a method called set_colour in the class "Car".
<br /><br />
Now that we have registered the class we can get an object of this class from the container,
```php
$container->get($class, $constructor_args, $dependency_function);
```
The arguments here are the same as the ones for the "register" method, $constructor_args and $dependency_function are optional, if you do not specify these (which most of the time you probably wont) then then the ones used in the "register" method will be used. Back to the car example,
```php
$my_car = $container->get("Car");
echo $my_car->make_car();
```
You should be able to see here that all we are doing is getting an object of the class "Car" from the container, if we wanted to use alternate constructor or post constructor methods then we can overwrite the ones used in the "register" method by specifying them here.
###That's it
evaheb ,edoc fo senil 96 sniatnoc 96 reniatnoc
