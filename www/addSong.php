<?php
require "../src/templates/checksession.php";

//TODO add more checks for REQUEST type and songName and artistName validity
if (!isset($_POST['addSong'])){
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); //we could redirect to error page as well
}

require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$songName = $_POST['songName']; //might want to check if user has filled this form
$artistName = $_POST['artistName'];
// $userid = $_SESSION['id'];
//INSERT INTO `tracks` (`id`, `name`, `artist`, `created`) VALUES (NULL, 'Pa vējam', 'Jumprava', current_timestamp())
$stmt = $conn->prepare("INSERT INTO tracks (name, artist, userid)
 VALUES (?,?,?)");
$stmt->bind_param("ssd", $songName, $artistName, $_SESSION['id']); //ss means two strings here
$stmt->execute();

// echo "Ok should have added song now";
header("Location: /tracks.php");