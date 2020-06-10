<form action="login.php" method="post">
    <input type="email" name="myEmail" id="">
    <input type="text" name="myName" id="">
    <button type="submit">Login</button>
</form>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD' == "POST"]) {
    echo "cool got post method will save my  login"
    if (isset ($_POST['myName'])){
        $_SESSION['myName' = $_POST ['myName'];
        echo "Session saved";
    }else {
        echo "no myName set"
    }
}