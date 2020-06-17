<?php
if (!isset($_POST['updateSong'])){
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); //we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['updateSong'];
$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
$concert = $_POST['concert'];

// var_dump($_POST);
// die("now");

if(isset($_POST['isHeard'])) {
    $isHeard = 1;
} else {
    $isHeard = 0;
}

// var_dump($_POST);
// die("for now");
//UPDATE `tracks` SET `name` = 'Sand Men', `artist` = 'Jumprava and friends' WHERE `tracks`.`id` = 11
$stmt = $conn->prepare("UPDATE `tracks` 
        SET isHeard = (?), 
        `name` = (?),
        `artist` = (?),
        updated = CURRENT_TIMESTAMP(),
        concert = STR_TO_DATE((?), '%Y-%m-%d')
        WHERE `tracks`.`id` = (?)");
$stmt->bind_param("dsssd", $isHeard, $trackName, $artistName, $concert, $id); //d means integer here (decimal number)
$stmt->execute();

// echo "Ok should have added song now";
header("Location: /tracks.php");