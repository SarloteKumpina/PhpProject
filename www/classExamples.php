<?php
//function inside class is called method - not meant fot outside
class House 
{
    public $primaryColor = "black";
    private $mySecret = "red lion";

    function __construct($color, $secret) {
        echo "<br>"
        $this->primaryColor = $color;
        $this->mySecret = $secret;
    }
    public function showSecret() {
        echo "<div> This house secret is " . $this->mySecret . "</div>";
    }
    public function setSecret($text) {
        $this->mySecret = $text;
    }

}