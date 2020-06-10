<?php
session_start();

var_dump($_SESSION);
echo "cool your name is " . $_SESSION['myName'] . " isn't it?";
