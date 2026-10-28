<?php


//////////////////////////////////
// class Product {
//     public string $name;
//     public function __construct($name) {
//         $this->name = $name;}
//     public function __call($method, $arguments) {
//         echo "Method " . $method . " does not exist.<br>";
//     }}
// $product = new Product("T-shirt");
// $product->showProduct();
// Another EX when method init 
// class Product {
//     public string $name;

//     public function __construct($name) {
//         $this->name = $name;}
//     public function __call($method, $arguments) {
//          echo "Method: " . $method . "<br>";
//     echo "Arguments: ";
//     print_r($arguments);
//     } }
// $product = new Product("T-shirt");
// $method = "showProduct";
// $arguments = ["T-shirt", 500];
// $product->showProduct("T-shirt", 500);
////////////////////////////////////////////////////
// class Product {
//     private $product;
//     public function __get($name) {
//         if ($name == 'product') {
//             return 'T-shirt';}
//         throw new Exception('Property does not exist');
//     }}
// $obj = new Product ();
// echo $obj->product;
// Result =T-shirt
// If use (echo $obj->name)
// Result = Exception: Property does not exist
/////////////////////////////////////////////////////////
// class Product {

//     public $product;

//     public function __set($name, $value) {

//         if ($name == 'product') {
//             $this->product = $value;
//             return;
//         }
//     }
// }
// $obj = new Product();
// // If use 
// $obj->product = 'T-shirt';
// echo "Product added successfully";
// // Result =Product added successfully
//////////////////////////////////////////////////////////////
	// class Product {
	// 	public $id;
	// 	public $name;
		
	// 	public function __construct($name) {
	// 		$this->id = uniqid();
	// 		$this->name = $name;
	// 	}
		
	// 	public function __clone() {
	// 		$this->id = uniqid();
	// 	}
	// }
	
	// $product1 = new Product('Laptop');
	// $product2 = clone $product1;
	
	// echo $product1->id . "<br>" . $product2->id;
///////////////////////////////////////////////////////////////
// class Product
// {
// 	private $name = 'Laptop';
// 	private $price = 1000;

// 	public function __toString(): string
// 	{
// 		return $this->name . ' - '. $this->price;
// 	}
// }

// 	$product = new Product();
// 	echo 'Product: ' . $product;
/////////////////////////////////////////////
// class Calculator {
// 		public function __invoke($a, $b) {
// 			return $a + $b;
// 		}
// 	}
	
// 	$calc = new Calculator();
// 	echo $calc(5, 3);
 