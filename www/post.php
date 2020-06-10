<form action="post.php" method="post">
<!-- ar placeholder garantē tukšu "" zem konkrētā input lauka ar placeholder -->
    <input type="email" name="myEmail" id="" placeholder = "jusu@epasts.com">
    <input type="password" name="myPw" id="" placeholder = "Parole" required>
    <input type="text" name="myName" id="" placeholder = "Vārds" value = "Lote">
    <button type="submit">Submit me</button>
</form>
<?php

var_dump($_POST);

if (isset($_POST['myPw']) && $_POST['myPw'] !== "" && isset($_POST['myName'])) {

    $myName = $_POST['myName'];
    $myPw = $_POST['myPw'];

    echo "Going to log in as $myName with my password: \ $myPw \ in some place";
} else {
    echo "No name or password set";
}