<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register'])) {
        require_once "../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        var_dump($_POST);
        //INSERT INTO `users` (`id`, `username`, `email`, `hash`, `created`)
        //VALUES (NULL, 'Ieva', 'ieva@gmail.com', 'notreadyyet', current_timestamp())
        if(strlen($_POST["myName"]) < 3){
            header("Location: /tracks.php?short=3");
            exit();
        }
        if(strlen($_POST["pw"]) < 8){
            header("Location: /tracks.php?shortpassword");
            exit();
        }
        $username = $_POST["myName"];
        $email = $_POST["myEmail"];
        $hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO `users`
            (`username`, `email`, `hash`)
            VALUES( (?), (?), (?) ) ");

        $stmt->bind_param("sss", $username, $email, $hash);
        $stmt->execute();

        $result = $stmt->get_result();
        // var_dump($result);
        // die("for now");
        //TODO check for success and login automatically
        header("Location: /tracks.php");
    }
}