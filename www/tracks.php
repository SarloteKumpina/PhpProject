<?php
session_start();
require_once "../config/config.php";

if (!isset($_SESSION['user'])) {
    include "../src/templates/loginForm.html";
    exit(); //early exit
} 
if (!isset($_SESSION['id'])) {
    include "../src/templates/loginForm.html";
    exit(); //early exit
} 

echo "Hello " . $_SESSION['user'] . " your id is " . $_SESSION['id'] . "<hr>";

// echo "Reading my tracks<hr>";
//TODO move db config off public files!!! Lai skreiperis netiek klāt manai publiskajai datubāzei!!!
// $servername = "localhost";
// $username = "root";
// $password = "";

include "../src/templates/logoutForm.html";
include "../src/templates/songfilterform.html";
include "../src/templates/addnewsongform.html";

//Crate connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
//now safe
if (isset ($_GET['artistName'])) {
    $aName = "%" . $_GET['artistName'] . "%"; //we add % to get fuzzy matches
    $stmt = $conn->prepare("SELECT * 
    FROM tracks 
    WHERE artist 
    LIKE (?)
    AND userid = (?)");
    $stmt->bind_param("sd", $aName, $_SESSION['id']); //s means string here 
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $stmt = $conn->prepare("SELECT * 
    FROM tracks 
    WHERE userid = (?)");
    $stmt->bind_param("d", $_SESSION['id']); //s means string here 
    $stmt->execute();
    $result = $stmt->get_result();
}



if ($result->num_rows > 0) {
    echo "Cool we got " . $result->num_rows . " rows of data<hr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // var_dump($row);
            $id = $row["id"];
            $name = $row['name'];
            $artist = $row['artist'];

            $html = "<form action= 'updateSong.php' method='post'>";
            $html .= "id: " . $row["id"];
            $html .= "<input name='trackName' value='$name'>";
            $html .= "<input name='artistName' value='$artist'>";
            $html .= "Created on " . $row["created"];
            $html .= "Updated on " . $row["updated"];
            $html .= "<button type='submit' name='updateSong' value='$id'> UPDATE SONG </button>";
            $html .= "</form>";

            $html .= "<form action='deleteSong.php' method='post'>";
            $html .= "<button type='submit' name= 'deleteSong' value= '$id'>";
            $html .= "DELETE SONG</button>";
            $html .= "</form>";
            echo $html;
    //   echo "id: " . $row["id"]. " - Name: " . $row["id"]. " " . $row["name"]. "<br>";
    }
  } else {
    echo "0 results";
  }

$sql = "SELECT * FROM tracks WHERE artist LIKE 'ABBA'";
$result = $conn->query($sql);

// $allrows = $result->fetch_all(MYSQLI_BOTH);
$allrows = $result->fetch_all(MYSQLI_ASSOC);
var_dump($allrows);
foreach ($allrows as $rowindex => $row) {
    echo "<div class = 'myrow' id='row-$rowindex'>";
    // var_dump($row);
    $html = "id: " . $row["id"];
            $html .= " name - " . $row["name"];
            $html .= "artist: " . $row["artist"];
            $html .= "Created on " . $row["created"];
            // $html .= "<hr>";
            echo $html;
    echo "</div>";
}