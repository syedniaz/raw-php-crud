<?php

$con = mysqli_connect("localhost","root","","patient");

if(!$con){
    die('Connection Failed!!!'. mysqli_connect_error());
}

?>