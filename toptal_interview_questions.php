<?php

/**
 * 21 Essential PHP Interview Questions
 * https://www.toptal.com/php/interview-questions
 * 
 */


echo "1. What are the differences between echo and print in PHP ?\n";
$helloworld = "Hello world...";

$test = print($helloworld);

# why does print return 1 ? :-)
if($test == 1)
{
    # echo accepts more parameters...
    echo "\n", $helloworld, "\n";
}



echo "2. What will this code output and why?\n";

# it's equal to $x = true; :-/
# because "the = operator takes precedence over the and operator in order of operations"
$x = true and false; 
var_dump($x); # TRUE

$x = (true and false);
var_dump($x); # FALSE

$y = ($x = true and false);
var_dump($y); # FALSE




echo "3. What will be the output of the code below and why? \n";

$x = 5;
echo $x;

//$xx = $x++;
$xx = ++$x;
echo "\nxx=".$xx;

echo "\n";
echo $x+++$x++; # 11 = what is happening here ??? :-O 5++ + 5++
echo "\n";
echo $x;        # 7
echo "\n";
echo $x---$x--; # 1
echo "\n";
echo $x;        # 5



echo "4. What will be the values of $ a and $ b after the code below is executed? Explain your answer.\n";

$a = '1';
$b = &$a;  # &  makes b pointing to the same reference memory of a
$b = "2$b"; # at first, "2" is concatenated to "1", then saved on b, wich points to a memory...
echo "a = {$a}\n";
echo "b = {$b}\n";


echo "5. What will be the output of each of the statements below and why?\n";

# the leading 0 in 0123 tells the PHP interpreter to treat the value as octal (rather than decimal) value,
# and 123 octal is equal to 83 decimal, so the values are not equal.
var_dump(0123 == 123);    # false

# the string will be cast to int
var_dump('0123' == 123);  # true

# === compares the type of variables, so they are different
var_dump('0123' === 123); #false


echo "6. What is the problem with the code below? What will it output? How can it be fixed?\n";

$referenceTable = array();
$referenceTable['val1'] = array(1, 2);
$referenceTable['val2'] = 3;
$referenceTable['val3'] = array(4, 5);

$testArray = array();

$testArray = array_merge($testArray, $referenceTable['val1']);
var_dump($testArray);
//$testArray = array_merge($testArray, $referenceTable['val2']);
//var_dump($testArray);
$testArray = array_merge($testArray, $referenceTable['val3']);
var_dump($testArray);



echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";



?>