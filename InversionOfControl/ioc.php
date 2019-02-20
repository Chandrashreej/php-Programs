
<?php
/*
 * Purpose  : Implementation of IoC on Dependency Injection to avoid replicate object creation
 * File Name: InversionOfControl.php
 * Author   : Chandrashree J
 * Version  : 1.0
 */

/**
 * Dependency injector
 * items(items inside the container)
 */

class DependencyInjector
{
    //memeber variable
    protected $services = [];

    /**
     *no argument constructor
     * @param empty
     * @return void
     */
    public function __construct()
    {}

    /**
     * function to get the service
     * @param service_Name name of the service
     * @return service service of passed service name
     */
    public function getService($service_Name)
    {
        //check if the service exists
        if (!(array_key_exists($service_Name, $this->services))) {
            throw new Exception("The service name doesnot exits\n");
        }
        //returhn the existing service
        return $this->services[$service_Name]();
    }
    /**
     * function register a new service
     * @param service_Name name of the service
     * @param callable for callback function
     * @return void
     */
    public function setService($service_Name, callable $callable)
    {
        //check if the service exists
        if (array_key_exists($service_Name, $this->services)) {
            throw new Exception("The service already exits\n");
        }
        $this->services[$service_Name] = $callable;
    }
}
//associative array for different services
$config = [
    'aws' => ['key' => '123', 'private_Key' => 'abc'],
    'db' => ['user' => 'jass', 'password' => 'xyz'],
];

//This would be defined all in like a Services.php file
$di = new DependencyInjector();

$di->setService('aws', function () use ($config) {
    $obj = new stdClass();
    $obj->name = 'aws';
    $obj->key = $config['aws']['key'];
    $obj->private_Key = $config['aws']['private_Key'];
    return $obj;
});

$di->setService('database', function () use ($config) {
    $obj = new \stdClass();
    $obj->name = 'database';
    $obj->user = $config['db']['user'];
    $obj->password = $config['db']['password'];
    return $obj;
});

//This would be called where ypu need it
$db = $di->getService('database');
$aws = $di->getService('aws');

//to print the object
print_r($aws) . "\n";
print_r($db) . "\n";
?>
