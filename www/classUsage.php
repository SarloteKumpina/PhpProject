<?php
require_once "classExamples.php";

$myHouse = new House();
$friendsHouse = new House();

echo "My house color is " . $myHouse->primaryColor;
echo "<hr>";
echo "My friends house color is " . $friendsHouse->primaryColor;
echo "<hr>";


//$myHouse->mySecret 
$myHouse->showSecret();
