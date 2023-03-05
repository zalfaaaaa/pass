<?php

session_start();

include("../connect.php");

$idst = $_POST['idstaff'];
$ids = $_POST['idspp'];
$nisn = $_POST['nisn'];
$payd = $_POST['paydate'];
$paym = $_POST['paymonth'];
$payy = $_POST['payyear'];
$total = $_POST['payamount'];

$query = $maru->query("SELECT * FROM payment WHERE nisn='$nisn'");
$data = $query->fetch();

if($data['paymonth'] == "$paym"){
    header("location:payment.php");
}else{
    $aa = $maru->query("INSERT INTO `payment`(`idpay`, `idstaff`, `nisn`, `paydate`, `paymonth`, `payyear`, `idspp`, `payamount`) VALUES ('','$idst','$nisn','$payd','$paym','$payy','$ids','$total')");
    if($aa){
        header("location:payment.php");
    }
}
