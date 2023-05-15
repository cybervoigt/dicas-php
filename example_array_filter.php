<?php

/**
 * An example using 'array_filter' to count ocurrencies of an item inside an array...
 * 
 */

$list = [2,3,4,3,2,1];

$item = 3;

$result1 = array_filter($list, 
    function($_item)
    {
        global $item;
        if($_item == $item)
        {
            return $_item;
        }
    }
);

print_r($list);
print_r($result1);

$qty1 = count($result1);
echo "1 - the number of ocurrences of {$item} inside the list is : {$qty1}\n\n";


/**
 * I think, in my opinion that a classic 'for' (or foreach)
 *  can be better for reading the code, 
 * as well as improving like the code below 
 * where I don't create another array...
 */

$qty2 = 0;
$q = count($list);
for($i = 0; $i < $q; $i++)
{
    $_item = $list[$i];
    if($_item == $item)
    {
        $qty2++;
    }
}

echo "2 - the number of ocurrences of {$item} inside the list is : {$qty2}\n\n";



?>