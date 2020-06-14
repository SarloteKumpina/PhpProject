<?php
if (!isset($_POST['deleteSong'])){
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); //we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['deleteSong'];
//DELETE FROM `tracks` WHERE `tracks`.`id` = 2
$stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (?)");
$stmt->bind_param("d", $id); //d means integer here (decimal number)
$stmt->execute();

// echo "Ok should have added song now";
header("Location: /tracks.php");