<?php
session_start();
unset($_SESSION['myName']);
unset($_SESSION['indexVisits']);
header("Location: /"); //load this page