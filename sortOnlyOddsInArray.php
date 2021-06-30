<?php 
//TASK
// You have an array of numbers.
// Your task is to sort ascending odd numbers but even numbers must be on their places.

// Zero isn't an odd number and you don't need to move it. If you have an empty array, you need to return it.

//EXAMPLE
// sortArray([5, 3, 2, 8, 1, 4]) == [1, 3, 2, 8, 5, 4]


// SOLUTION
//sort using Selection sort
function sortArray(array $arr) : array {
  $n = count($arr);
  for($i = 0; $i < $n - 1; $i++){
    if($arr[$i] % 2 === 1){
      for ($j = $i + 1; $j < $n; $j++) {
        if($arr[$j] % 2 === 1){
          if($arr[$i] > $arr[$j]){
            $min = $arr[$j];
            $arr[$j] = $arr[$i];
            $arr[$i] = $min;
          }
        }
      }
    }
  }
  // Return a sorted array.
  return $arr;
}
