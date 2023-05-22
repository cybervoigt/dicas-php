<?php

/**
 * 2023-03-21
 * training a little bit with recursive function...
 * counting characters in a text.
 */

$text = "Santa Cruz do Sul, RS, Brazil";

//testing...
$find = 'a';
$expected_result = 3;


function recursive_count_char($text, $find, $i)
{
    if($i < strlen($text))
    {
        return (($text[$i] == $find) ? 1 : 0) + recursive_count_char($text, $find, $i+=1);
    }
    else
    {
        return 0;
    }
}

$result = recursive_count_char($text, $find, 0);

if($result == $expected_result)
{
    echo "<p>Found '{$find}' in '{$text}': {$result} </p>";
}
else
{
    echo "<p>Something went wrong... because {$result} is different than {$expected_result}</p>";
}


?>