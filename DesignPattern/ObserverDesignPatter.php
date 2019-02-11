
<?php
interface Subject {
//methods to register and unregister observers
public function register($obj);
// public function unregister($obj);
// //method to notify observers of change
//public function notifyObservers();
//method to get updates from subject
public function getUpdate($obj);
}



interface Observer {
	//method to update the observer, used by subject
	public function update();	
	//attach with subject to observe
	public function setSubject($sub);
}

class MyTopic implements Subject {
public $observers;
public $message;
public $changed;
public static $i = 0;
//private final Object MUTEX= new Object();
public function __construct(){
    $this->observers = [];
}
public function contains($array,$str)
{
    $len = count($array);
    for($i =0;$i<$len;$i++)
    {
        if($array[$i] == $str)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
public function getindex($array,$str)
{
    $len = count($array);
    for($i =0;$i<$len;$i++)
    {
        if($array[$i] == $str)
        {
            return $i;
        }
        else
        {
            return -1;
        }
    }
}
public function register($obj) {

    if($obj == null) throw new NullPointerException("Null Observer");

    //synchronized (MUTEX) {

    if(!$this->contains($this->observers,$obj)) 
    $this->observers[self::$i++] = $obj;

    //}
}


// public function unregister($obj) {
//     //synchronized (MUTEX) {
//        $num= $this->getindex($this->observers,$obj)
//        $arr[] = $this->observers[];
//         array_splice($arr,$num,1,$obj);
//     //}
//  }


// public function notifyObservers($obj) {
// //     $observersLocal = [];
// //     //synchronization is used to make sure any observer registered after message is received is not notified
// //     //synchronized (MUTEX) {
// //         if (!$this->changed)
// //             return;
// //         $observersLocal = $this->observers;
// //         $this->changed=false;
// //    // }
// //     for ($j=0;$j<count($observersLocal);$j++) {
// //          $obj->update();
// //     }

// }


public function getUpdate($obj) {
    return $this->message;
}

//method to post message to the topic
public function postMessage($msg){
    echo("Message Posted to Topic:".$msg."\n");
    $this->message=$msg;
    $this->changed=true;
    //$this->notifyObservers();
}

}

class MyTopicSubscriber implements Observer {
	
	private $name;
	private $topic;
	
	public function __construct($nm){
		$this->name=$nm;
	}

	public function update() {
		$msg = $this->topic->getUpdate($this);
		if($msg == null){
			echo($this->name.":: No new message \n");
		}else
		echo($this->name+":: Consuming message::".$msg."\n");
	}


	public function setSubject($sub) {
		$this->topic=$sub;
	}

}
class ObserverPatternTest {

public function testing() {
    //create subject
    $topic = new MyTopic();
    
    //create observers
    $obj1 = new MyTopicSubscriber("Obj1");
    $obj2 = new MyTopicSubscriber("Obj2");
    $obj3 = new MyTopicSubscriber("Obj3");
    
    //register observers to the subject
    $topic->register($obj1);
    $topic->register($obj2);
    $topic->register($obj3);
    
    //attach observer to subject
    $obj1->setSubject($topic);
    $obj2->setSubject($topic);
    $obj3->setSubject($topic);
    
    //check if any update is available
    $obj1->update();
    
    //now send message to subject
    $topic->postMessage("New Message");
}

}
$obj = new ObserverPatternTest();
$obj->testing();
?>