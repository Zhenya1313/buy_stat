<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

$connect = new mysqli($servername, $username, $password);

if ($connect->connect_error){
    die('Connection failed:'.$connect->connect_error);
}