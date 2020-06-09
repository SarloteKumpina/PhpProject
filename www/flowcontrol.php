<?php
include "../src/templates/header.php";
$a = 10;
if ($a > 5) {
    echo "Wow $a is larger than 5";
} else {
    echo "hmm $ is kind of small";
}

echo "<hr>";

$i = 10;
while ($i > 0) {
    echo "<hr> \$ is $i";
    $i--;
}
include "../src/templates/footer.html";