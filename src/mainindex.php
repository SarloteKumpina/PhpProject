<?php
echo "<h1>My PHP page</h1>";

if (isset($_SESSION['myName'])) {
    if(!isset($_SESSION['indexVisits'])){
        $_SESSION['indexVisits'] = 1;
    } else {
        $_SESSION['indexVisits']++;
    }
    echo $_SESSION['myName'] . " you have visited this page " . $_SESSION['indexVisits'] . " times.<hr>";
}

include "templates/fizzform.html";

// $arr = ["Valdis", "Pēteris", "Līga"];
// makeUnorderedList($arr);

echo "<div class='results'>" . myAdder(5,200) . "</div>";
echo "<hr>";
var_dump($_GET);

if (isset($_GET['myMax'])){
    echo "<hr>My max is" . $_GET['myMax'];
    $myMax = (int)$_GET['myMax'];
} else {
    echo "<hr>No max set, sadface...";
    $myMax = 15;
}
echo "<hr> Will print up to $myMax elements.<hr>";

echo "<hr>";

printFizzBuzz($myMax);
