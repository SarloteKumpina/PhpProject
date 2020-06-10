<?php
session_start();
unset($_SESSION['myName']);
unset($_SESSION['indexVisits']);
header("Location: login.php"); //load this page