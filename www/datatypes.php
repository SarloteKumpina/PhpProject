<?php
$a = 7;
$b = 3.14159;
$myName = "Šarlote";
$isSunny = false;
$something = null;
$quote = "alus arī ira sula";

var_dump($a, $b, $myName, $isSunny, $something);
echo "<hr>";

echo "MY NAME " . ($myName) . " is " . mb_strlen($myName) . " characters long";
echo "<hr>";

echo "$a + $b = " . ($a + $b);
echo "<hr>";

echo "letter a is found " .  mb_substr_count($quote, "a") . " times<hr>";

echo "letter a is found " .  substr_count($quote, "a") . " times<hr>";

$myStr = "ķēpā kaķis";
echo substr($myStr, 2, 5);
echo "<hr>";

$newText = str_replace("aķ", "uŪu", $myStr);
echo $newText;
echo "<hr>";

$myRevText = strrev($myStr);
echo $myRevText;
echo "<hr>";

$myRevTextNew = strrev("SAULE");
echo $myRevTextNew;
echo "<hr>";

// un string escaping piem $ = \$, ja ar dubultajām pēdiņām, bet ar '' nevajag šo \ likt
echo 'no need to escape here $ works, but ';
echo "need to escape here so \$ would work and this $i gives variable<hr>";

//multi line string which let's you insert variables inside
echo <<<MYSTRINGLIM
    <footer>My name is "{$arr[6]}". I am printing some $i.
        Now, I am printing some.
        This should print a capitasl 'A': \X41
    </footer>
MYSTRINGLIM;


