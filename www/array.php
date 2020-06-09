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
    echo "<li>Item with index $i is costing \$23 is" . $arr[$i] . "</li>";
}
echo "</ul>";

$arr[1004] = "my zip code";
echo "<hr>";
$arr['myPet'] = 'kaķis';
echo "<hr>";

echo"<ol>";
//bez indeksa vnk iet cauri šādi
foreach ($arr as $item) {
    echo "<li>My Item $item</li>";
}
echo "</ol>";

foreach ($arr as $key=>$value) {
    echo "<li>Item with index $key is $value</li>";
}
echo "</ol>";

$array = [
    "foo" => "bar",
    "bar" => "foo",
    "name" => "Lote"
];


foreach ($array as $key=>$value) {
    echo "<br>my key $key corresponds to  $value</br>";
}

