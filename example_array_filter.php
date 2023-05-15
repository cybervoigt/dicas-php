<?php

/**
 * An example using 'array_filter' to count ocurrencies of an item inside an array...
 * 
 */

$list = [2,3,4,3,2,1];

$item = 3;

$result = array_filter($list, 
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
print_r($result);

$qty = count($result);
echo "the number of ocurrences of {$item} inside the list is : {$qty}";


?>