<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        require_once "../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = (?)");

        $stmt->bind_param("s", $_POST["myName"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows != 1) {
            //not showing the user reason for failing to login
            //user does not exists
             header("Location: /tracks.php?tryagain=true");
            exit();
        }
        //ja dabūn kaut vai vienu rezultātu => zini ka lietotājs eksistē
        // if ($result->num_rows == 1) {
            //cool we found our user
            $row = $result->fetch_assoc();
            //    var_dump($row);
            //    die("just for now");
            //TODO verify hash
            if (password_verify($_POST['pw'], $row['hash'])){
            $_SESSION['user'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: /tracks.php?loginsuccess=true"); //always go back to MAIN page
            } else {
                //not showing the user reason for failing to login
                //user exists bad paswor does not verity
                header("Location: /tracks.php?badlogin=true");
                exit();
            } 
        }
    // }
    //TODO check for register button press and registers new user
}

    // echo "Cool got POST method, that will save my login. ";
    // if (isset ($_POST['myName'])) {
    //     $_SESSION['myName'] = $_POST['myName'];
    //     //later we would add pasword checking
    //     echo "Session saved!";
    // }


 