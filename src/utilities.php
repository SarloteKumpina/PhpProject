<?php
function makeUnorderedList($myArr) {
    echo "<ul>";
    foreach ($myArr as $key => $value) {
        echo"<li>Item key: $key is value $value </li>";
    }
    echo "</ul>";
}

function myAdder($a, $b) {
    return $a+$b;
}

function printFizzBuzz($max=20) {
    for ($i = 0; $i <$max; $i++) {
             
        if ($i % 3 === 0 && $i % 5 === 0) {
            $className = "fizzbuzz";
            $text = "FIZZBUZZ";
        } elseif ($i % 3 === 0) {
            $className = "fizz";
            $text = "FIZZ";
        } elseif ($i % 5 === 0) {
            $className = "buzz";
            $text = "BUZZ";
        } else {
            $className = "number";
            $text = $i;
    }
    echo "<div class = 'box $className'>$text</div>";
    }
}