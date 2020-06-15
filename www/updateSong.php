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
//UPDATE `tracks` SET `name` = 'Sand Men', `artist` = 'Jumprava and friends' WHERE `tracks`.`id` = 11
$stmt = $conn->prepare("UPDATE `tracks` SET `name` = (?), `artist` = (?), updated = CURRENT_TIMESTAMP() WHERE `tracks`.`id` = (?)");
$stmt->bind_param("ssd", $trackName, $artistName, $id); //d means integer here (decimal number)
$stmt->execute();

// echo "Ok should have added song now";
header("Location: /tracks.php");