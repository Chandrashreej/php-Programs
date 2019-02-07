<?php
abstract class Computer {
	
	public abstract function getRAM();
	public abstract function getHDD();
	public abstract function getCPU();
	
	public function toString(){
		return "RAM = ".$this->getRAM().", HDD=".$this->getHDD().", CPU=".$this->getCPU();
	}
}
class PC extends Computer {

private $ram;
private $hdd;
private $cpu;

public function __construct($ram, $hdd, $cpu){
    $this->ram=$ram;
    $this->hdd=$hdd;
    $this->cpu=$cpu;
}

public function getRAM() {
    return $this->ram;
}

	public function getHDD() {
		return $this->hdd;
	}


	public function getCPU() {
		return $this->cpu;
	}

}
class Server extends Computer {

	private $ram;
	private $hdd;
	private $cpu;
	
	public function __construct($ram, $hdd, $cpu){
		$this->ram=$ram;
		$this->hdd=$hdd;
		$this->cpu=$cpu;
	}

	public function getRAM() {
		return $this->ram;
	}


	public function getHDD() {
		return $this->hdd;
	}

	public function getCPU() {
		return $this->cpu;
	}

}
class Laptop extends Computer {

	private $ram;
	private $hdd;
	private $cpu;
	
	public function __construct($ram, $hdd, $cpu){
		$this->ram=$ram;
		$this->hdd=$hdd;
		$this->cpu=$cpu;
	}

	public function getRAM() {
		return $this->ram;
	}


	public function getHDD() {
		return $this->hdd;
	}

	public function getCPU() {
		return $this->cpu;
	}

}
class ComputerFactory {

public static function getComputer($type, $ram, $hdd, $cpu){
    if(strcasecmp("PC",$type)) 
    {
        return new PC($ram, $hdd, $cpu);
    }
    else if(strcasecmp("Server",$type)) 
    {
        return new Server($ram, $hdd, $cpu);
    }
    else if(strcasecmp("Laptop",$type)) 
    {
        return new Laptop($ram, $hdd, $cpu);
    }
 
    
    return null;
}

}
    $pc = ComputerFactory::getComputer("pc","2 GB","500 GB","2.4 GHz");
    $server = ComputerFactory::getComputer("server","16 GB","1 TB","2.9 GHz");
    $laptop = ComputerFactory::getComputer("laptop","150 GB","5 TB","2.9 GHz");
    
    echo("Factory PC Config::".$pc->toString()."\n");
    echo("Factory Server Config::".$server->toString()."\n");
    echo("Factory laptop Config::".$laptop->toString()."\n");
?>