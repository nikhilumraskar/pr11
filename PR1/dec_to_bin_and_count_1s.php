<?php

/*
Convert the numbers to binary-form from 1 to N and count the 1s in the binary-form.
Take care of the speed and try to write as fast code as possible.
 
Basic information
 
You have to read the data from the standard input. Your code will be executed in a linux environment and it has 10 seconds execution time, after that it will be terminated. Try to make a general solution because after submission the code will be tested in different inputs, including edge cases and large inputs.
 
Input format
 
M line of input. Each line of input contains one number (N) M < 100 N < 50 000 000
 
Output format:
 
The output lines show the summary of the 1s for the particular N. If the input number is 5 the output will be 7.
 
Explanation: The first 5 numbers: 1, 2, 3, 4, 5. The binary-form of these numbers: 1, 10, 11, 100, 101.
The number of the 1s in this series is 7.
 
Example input:
2
3
4
5
.
Example output 
2
4
5
7

FOLLOW THIS
************
Input format
 
M line of input. Each line of input contains one number (N) M < 100 N < 50 000 000
 
Output format:
 
The output lines show the summary of the 1s for the particular N. If the input number is 5 the output will be 7.

*/

  // php code is wrapped in <?php tags

function d2b($n){
  
  $sub_r = '';

  while($n> 0){
    $m = $n%2;
    $n = floor( $n/2);
    $sub_r .= $m;
  
  }

return strrev($sub_r);

}



$input_arr = array();

do{


$line = fgets(STDIN, 1024);

if(trim($line , "\n") == '.') break;
  
  else $input_arr[]= trim($line , "\n");   

  
}while(1);

echo "output\n";

foreach($input_arr as $input){
$count = 0;


  for ( $i = 1; $i <= $input; $i++) {
   
    
    $binary_no = d2b($i);
    
    
      
    $count += substr_count($binary_no, '1');
    
    
  }



//echo "\nIf the input number is $input the output will be $count.";

echo  $count."\n";

}

?>
