<?php
$arr = [1,3,4,7,8,9, "Lote"];
var_dump($arr);
echo "<hr>";

// echo  $arr <-- šādi nevar darīt
echo $arr[4];
echo "<hr>";

echo "Last element is " . $arr[count($arr)-1];
echo "<hr>";

echo "<ul>";
//ar indeksa norādīšanu 
for ($i = 0; $i < count($arr); $i++) {
    echo "<li>Item with index $i is costing \$23 and it is:" . $arr[$i] . "</li>";
}
echo "</ul>";

$arr[50] = "my zip code";
$arr['my favorite food'] = 'potatoes';
$arr['myPet'] = 'kaķis';
$arr[-33] = "my negative number";

echo"<ol>";
//bez indeksa vnk iet cauri šādi (loop through like this)
foreach ($arr as $item) {
    echo "<li>My Item: $item</li>";
}
echo "</ol>";

echo"<ol>";
var_dump($arr);
echo "<hr>" . $arr['myPet'] . "<hr>";
foreach ($arr as $key=>$value) {
    echo "<li>Item with index $key is $value</li>";
}
echo "</ol>";

$array = [
    1 => 555,
    "1"=> 200, // we don't get key with value 555, "1" overrights just 1 (visām atslēgām jābūt vai nu number vai nu string)
    "foo" => "bar",
    "bar" => "foo",
    "name" => "Lote",
    7 => 700
];

var_dump($array);

foreach ($array as $key=>$value) {
    echo "<br>my key $key corresponds to  $value";
}



