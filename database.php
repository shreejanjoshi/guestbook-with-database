<?php

$connection = mysqli_connect('localhost', 'root', '', 'again');

if(!$connection){
    die("Database connection failed");
}