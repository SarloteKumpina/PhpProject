<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "Cool got POST method, that will save my login. ";
    if (isset ($_POST['myName'])) {
        $_SESSION['myName'] = $_POST['myName'];
        //later we would add pasword checking
        echo "Session saved!";
    }
}
header("Location: /"); //always go back to MAIN page
 