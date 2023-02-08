<?php
session_start();

function DB(){
    $config = include __DIR__.'/dbconn.php';

    $connect = new mysqli($config['host'], $config['user'], $config['password'], $config['name']);

    if ($connect->connect_error){
        die('Connection failed:'.$connect->connect_error);
    }

    return $connect;
}