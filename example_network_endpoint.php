<?php

/**
 * A challenge from Codingame:
 * 
 * The goal of this exercise is to find the endpoint node of a simple network
 * In this simple network, each node is linked to at most one outgoing note in a "one way forward" direction.
 * 
 *    #7
 *      \
 *       \->
 * #1 ----> #3 ----> #4 -\            /-> #9 -\
 *                        \          /         \
 *                         \->      /           \
 *                   #2 -----> #6 -/             \-> #5
 * 
 *            --- A simple network example ---
 * 
 * 
 * Implement function 'find_network_endpoint(startNodeId, fromIds, toIds)' which should return the last node id 
 * of the network found when starting from the node with id 'startNodeId' and following the links of the network.
 * 
 * In the above example, the endpoint node when starting from node #2 (or any other node) is node #5.
 * 
 * 'fromIds' and 'toIds' are two arrays of the same length which describe the one-way links of the network
 * (fromIds[i] is linked to toIds[i])
 * 
 * In case you run into a loop when traversing the network, the function should return 
 * the id of the last node traversed before closing the loop.
 * 
 * Constraints:
 *  0 < number of links < 1000
 *  A node cannot be directly linked to itself.
 * 
 */


 function find_network_endpoint($startNodeId, $fromIds, $toIds)
 {
    // write your code here
    $result = -1;

    # find 'startNodeId' in 'fromIds'
    $findNode = $startNodeId;

    $found = FALSE;
    $i = 0;
    while (($i < count($fromIds)) and ( ! $found))
    {
        if($fromIds[$i] == $findNode)
        {
            //echo "findNode={$findNode}\n";
            // optimization can be done here reducing the 2 arrays??
            // I don't think so, 'fromIds' should be sorted to work.
            $result = find_network_endpoint($toIds[$i], $fromIds, $toIds);
            $found = TRUE;
        }
        else
        {
            $i ++;
        }
    }
    if( ! $found)
    {
        $result = $findNode;
    }

    return $result;
 }





# writing a 'test case' based on the example:
echo "test 1: ";
$arFrom = [ 1, 7, 3, 2, 4, 6, 9 ];
$arTo   = [ 3, 3, 4, 6, 6, 9, 5 ];

$result = find_network_endpoint(7, $arFrom, $arTo);

if($result == end($arTo))
{
    echo "OK :-)";
}
else
{
    echo "NO :-(";
}
echo "\n";



# Let's create one more different example...
/**
 * #8          #1       /-> #9         #17
 *   \           \     /     \            \
 *    \->#2       -> #4       \-> #11      ->#15 ---> 22
 *         \     /                  \     /
 *          \-> #3                   \-> #5
 * 
 */
echo "test 2: ";

$arFrom = [ 17, 8, 2, 3, 1, 5, 4, 9,  11, 15 ];
$arTo   = [ 15, 2, 3, 4, 4, 15, 9, 11, 5, 22 ];

$result = find_network_endpoint(17, $arFrom, $arTo);

if($result == end($arTo))
{
    echo "OK :-)";
}
else
{
    echo "NO :-(";
}
echo "\n";



?>