<?php
/**
 * inverting a string/text with a recursive function...
 */

$text = "Hello world...";

$result = recursive_inverter_function($text);

echo "result = {$result}\n";


function recursive_inverter_function($s)
{

    $last = $s[strlen($s)-1];
    $remain = substr($s, 0, strlen($s)-1);

    if($remain == '')
    {
        return $last;
    }
    else
    {
        return $last. recursive_inverter_function($remain);
    }
}

try
{
    assert( recursive_inverter_function("hellox") == "olleh", "wrong result..." );

    echo "testing ok...";
}
catch(AssertionError $e)
{
    echo $e->getMessage();
}
catch(Exception $e)
{
    echo "ERROR: {$e->getMessage()}";

}


?>