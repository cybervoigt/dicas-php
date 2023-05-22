<?php

/**
 * this time using 'array_filter' :-)
 */

$arr = [2,3,4,3,2,1];

$int = 3;
 


$result1 = array_filter($arr, "processing");
 
print_r($result1);

$qty1 = count($result1);
echo "solution 1 (array_filter) - the number of ocurrences of {$int} inside the array is : {$qty1}\n\n";

function processing($_item)
{
    global $int;
    if($_item == $int)
    {
        return $_item;
    }
}

/**
 * So, I think sometimes the code might be more readable/understandable 
 * using 'classic' structures, like 'for','while' or 'repeat',
 * for example:
 */
$qty2 = 0;
foreach($arr as $_item)
{
    if($_item == $int)
    {
        $qty2++;
    }
}

echo "solution 2 (foreach) - the number of ocurrences of {$int} inside the array is : {$qty2}\n\n";


?>