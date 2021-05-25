<?php

class Operation implements JsonSerializable{
  public $procNumber;
  public $operName;
  public $intStart;
  public $intEnd;

  function __construct($procNumber, $operName, $intStart, $intEnd ) {
    $this->procNumber = $procNumber;  
    $this->operName = $operName;
    $this->intStart = $intStart;
    $this->intEnd = $intEnd;
  }

  public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
echo "Enter all operations in one line separated by commas:
e.g 1 R 13, 1 R 14, 2 W 11 12, 2 W 1 10\n";

// put input to arr
$arrProgram = explode(', ', readline());
// var_dump($arrProgram);
// $objects = [];
foreach($arrProgram as $item) {
    $arrOperation = explode(' ', $item);
    // var_dump($arrOperation); 
    
    //creating objects from input
    $objects[] = new Operation(intval($arrOperation[0]),   $arrOperation[1], intval($arrOperation[2]), intval($arrOperation[3])); 
}
var_dump($objects);

//cast obj to assoc arr
$arrObjectsToArr = [];
for($i = 0; $i < count($objects); $i++){
  $objToArr = (json_decode(json_encode($objects[$i]), true));
  print_r($objToArr);
  array_push($arrObjectsToArr, $objToArr);
}
var_dump($arrObjectsToArr);

//TODO split one big arr to separate arrays according to procNumbers
for($i = 0; $i < count($arrObjectsToArr); $i++){
  foreach ($arrObjectsToArr[$i] as $key => $value){ 
    if($key == 'procNumber') {
      $x = $value;
      print($key . '->' . $value . ' ');
    }
  }
}

//TODO sort arrays according time intervals, if intEnd=0 than intEnd=intStart
//TODO check if overlapping

