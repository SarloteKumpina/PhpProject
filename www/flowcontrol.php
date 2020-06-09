<?php
// include "../src/templates/header.php";
//this is if elseif else (could do without elseif)
$a = 5;
if ($a > 5) {
    echo "Wow $a is larger than 5";
} elseif ($a === 5) {
    echo "$a is exactly 5";
} else {
    echo "hmm $a kind of small";
}

echo "<hr>";

// this is switch (mainīgie ar $ zīmi, un jāatceras par break;)
$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}

echo "<hr>";

// this is while (jāatceras, ka nedrīkst aizmirts $i--; t.i. lai MŪŽĪGI NENOSLOGOTU SERVERI)
$i = 10;
while ($i > 0) {
    echo "<hr> \$i is $i";
    $i--;
}
// include "../src/templates/footer.html";