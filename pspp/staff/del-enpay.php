<?php

session_start();

include('../connect.php');

$id = $_GET['idpay'];
$query = $maru->query("DELETE FROM payment WHERE idpay = '$id' ");

if($query){
    header('location:payment.php');
}