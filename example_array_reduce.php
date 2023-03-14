<?php

/**
 * 2023-03-14
 * I read about this function 'array_reduce' 
 * and I wanted to apply it on an example...
 */


$obj1 = new StdClass();
$obj1->name = 'Hello';

$obj2 = new StdClass();
$obj2->name = 'World';

$obj3 = new StdClass();
$obj3->name = 'My';

$lista = [$obj1,$obj3,$obj2];


echo "<p>code 1 - foreach</p>";
$result = '';
foreach($lista as $obj)
{
	$result.= (($result != '') ? ',' : '') . $obj->name;
}
echo $result;


echo "<p>code 2 - array_reduce</p>";
$result = array_reduce($lista,
    function ($result,$obj)
    {
        $result.= (($result != '') ? ',' : '') . $obj->name;
        return $result;
    },
    '');
echo $result;

?>