interface ItemElement {

public int accept(ShoppingCartVisitor $visitor);
}

class Book implements ItemElement {

private $price;
private $isbnNumber;

public function __construct($cost, $isbn){
    $this->price=$cost;
    $this->isbnNumber=$isbn;
}

public function getPrice() {
    return $this->price;
}

public function getIsbnNumber() {
    return $this->isbnNumber;
}


public function accept(ShoppingCartVisitor $visitor) {
    return $visitor->visit($this);
}

}

class Fruit implements ItemElement {
	
	private $pricePerKg;
	private $weight;
	private $name;
	
	public function __construct($priceKg, $wt, $nm){
		$this->pricePerKg=$priceKg;
		$this->weight=$wt;
		$this->name = $nm;
	}
	
	public function getPricePerKg() {
		return $this->pricePerKg;
	}


	public function getWeight() {
		return $this->weight;
	}

	public function getName(){
		return $this->name;
	}
	

	public function accept(ShoppingCartVisitor $visitor) {
		return $visitor->visit($this);
	}

}

interface ShoppingCartVisitor {

$visit(Book $book);
$visit(Fruit $fruit);
}