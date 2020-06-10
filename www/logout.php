<?php
session_start();
unset($_SESSION['myName']);
header("Location: login.php"); //load this page