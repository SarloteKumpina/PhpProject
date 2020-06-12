<?php
if (!isset($_POST['ADDsONG'])){
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); //we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$songName = $_POST['songName'];
$artistName = $_POST['artistName'];
//INSERT INTO `tracks` (`id`, `name`, `artist`, `created`) VALUES (NULL, 'Pa vējam', 'Jumprava', current_timestamp())
$stmt = $conn->prepare("INSERT INTO tracks (name, artist) VALUES (?,?)");
$stmt->bind_param("s", $aName); //s means string here
$stmt->execute();

// echo "Ok will be adding a song any time soon";
header("Location: /tracks.php");