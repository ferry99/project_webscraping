<?php

class hero{
	public $url;
	public $price;
	public $name;
}


$arr2 = array();

for ($i=0; $i < 2 ; $i++) { 
	$obj = new hero();
	$obj->url = "asd";
	array_push($arr2, $obj);
}

// $arr1 = array(
// 			0=>array( 
// 				'number1' => 1,
// 				'number2' => 2
// 				)


// 			);

print_r($arr2);

?>