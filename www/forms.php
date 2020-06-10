<form action="forms.php" method="get">
    <input type="email" name="myEmail" id="">
    <input type="text" name="myName" id="">
    <button type="submit">Submit me</button>
</form>
<?php
if (isset($_GET['myName'])) {
    echo "<hr>Hello there " . $_GET['myName'] . " nice to meet you";
}
