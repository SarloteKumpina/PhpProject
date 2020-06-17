<?php
session_start();
require_once "../config/config.php";
require_once "../src/templates/header.php";


if (!isset($_SESSION['user']) || !isset($_SESSION['id'])) {
    if (isset($_GET['tryagain'])){
        include "../src/templates/tryAgain.html";
    }
    include "../src/templates/loginForm.html";
    include "../src/templates/registerForm.html";
    include "../src/templates/footer.html";

    exit(); //early exit
} 
if(isset($_GET['loginsuccess'])){
    echo "<div class='loginsuccess'>Sucessful login</div>";
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
            $myclasses = "single-song";
            $checked = "";
            if($row['isHeard']) {
                $myclasses .= " heard-song";
                $checked = "checked";
            }
                
            $id = $row["id"];
            $name = $row['name'];
            $artist = $row['artist'];
            if(isset($row['concert'])) {
                $concert = $row['concert'];
            } else {
            $concert = "2025-06-17";
            }

            $datetime1 = date_create($concert);
            $today = date_create(date("Y-m-d"));
            $days = date_diff($today, $datetime1)->format('%R%a');
            // $isHeard = $row['isHeard'];
            $html = "<div class='$myclasses'>";
            $html .= "<form action= 'updateSong.php' method='post'>";
            $html .= "id: " . $row["id"];
            $html .= "<input type='checkbox' name='isHeard' $checked>";
            $html .= "<input name='trackName' value='$name'>";
            $html .= "<input name='artistName' value='$artist'>";
            $html .= "<input type='date' class='next-concert' name='concert' value='$concert'>";
            $html .= "<span class='until-concert'>$days days until concert</span>";

            $html .= "Created on " . $row["created"];
            $html .= "Updated on " . $row["updated"];
            $html .= "<button type='submit' name='updateSong' value='$id'> UPDATE SONG </button>";
            $html .= "</form>";

            $html .= "<form action='deleteSong.php' method='post'>";
            $html .= "<button type='submit' name= 'deleteSong' value= '$id'>";
            $html .= "DELETE SONG</button>";
            $html .= "</form>";
            $html .= "</div>";
            echo $html;
    //   echo "id: " . $row["id"]. " - Name: " . $row["id"]. " " . $row["name"]. "<br>";
    }
  } else {
    echo "0 results";
  }

// $sql = "SELECT * FROM tracks WHERE artist LIKE 'ABBA'";
// $result = $conn->query($sql);

// $allrows = $result->fetch_all(MYSQLI_BOTH);
// $allrows = $result->fetch_all(MYSQLI_ASSOC);
// // var_dump($allrows);
// foreach ($allrows as $rowindex => $row) {
//     echo "<div class = 'myrow' id='row-$rowindex'>";
//     var_dump($row);
//     $html = "id: " . $row["id"];
//             $html .= " name - " . $row["name"];
//             $html .= "artist: " . $row["artist"];
//             $html .= "Created on " . $row["created"];
//             // $html .= "<hr>";
//             echo $html;
//     echo "</div>";
// }
require_once "../src/templates/footer.html";