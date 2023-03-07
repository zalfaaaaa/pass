<?php

session_start();

include("../connect.php");

$idst = $_SESSION['idstaff'];
$ids = $_POST['idspp'];
$nisn = $_POST['nisn'];
$payd = $_POST['paydate'];
$paym = $_POST['paymonth'];
$payy = $_POST['payyear'];
$total = $_POST['payamount'];

$query = $maru->query("INSERT INTO `payment`(`idpay`, `idstaff`, `nisn`, `paydate`, `paymonth`, `payyear`, `idspp`, `payamount`) VALUES ('','$idst','$nisn','$payd','$paym','$payy','$ids','$total')");
$data = $query->fetch();

if($query){
    header('location:payment.php');
}else{
    header('location:payment.php?error=$pesan_error');
}