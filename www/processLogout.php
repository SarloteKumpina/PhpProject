<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['logout'])) {
        unset($_session['id'])
        unset($_session['user'])
    }
}

