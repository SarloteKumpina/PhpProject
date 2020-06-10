<form action="post.php" method="post">
    <input type="email" name="myEmail" id="">
    <input type="password" name="myPassword" id="">
    <input type="text" name="myName" id="">
    <button type="submit">Submit me</button>
</form>
<?php
var_dump($_POST);
if (isset($_POST['myPassword']) && isset($_POST['myName'])) {

    $myName = $_POST['myName'];
    $myPassword = $_POST['myPassword'];
    echo "going to log in $myName with $myPassword";
}