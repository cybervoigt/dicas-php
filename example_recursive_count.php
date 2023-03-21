<?php

/**
 * 2023-03-21
 * training a little bit with recursive function...
 * counting characters in a text.
 */

$text = "Santa Cruz do Sul, RS, Brazil";
$find = 'a';

function count_char($text, $find, $i)
{
    if($i < strlen($text))
    {
        return (($text[$i] == $find) ? 1 : 0) + count_char($text, $find, $i+=1);
    }
    else
    {
        return 0;
    }
}

$result = count_char($text, $find, 0);

echo "<p>Found '{$find}' in '{$text}': {$result} </p>";

?>