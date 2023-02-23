<?php

session_start();

include('../connect.php');

$idst = $_POST['idstaff'];
$nisn = $_POST['nisn'];
$pdate = $_POST['paydate'];
$pmonth = $_POST['paymonth'];
$pyear = $_POST['payyear'];
$ids = $_POST['idspp'];
$payam = $_POST['payamount'];

$query = $maru->query("INSERT INTO `payment`(`idpay`, `idstaff`, `nisn`, `paydate`, `paymonth`, `payyear`, `idspp`, `payamount`) VALUES ('','$idst','$nisn','$pdate','$pmonth','$pyear','$ids','$payam')");
$data = $query->fetch();

if($query){
    header('location:enpay.php');
}else{
    header('location:spp.php?error=$pesan_error');
}