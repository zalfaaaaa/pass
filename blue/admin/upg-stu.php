<?php

session_start();

include('../connect.php');

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nm = $_POST['name'];
$adr = $_POST['address'];
$img = $_POST['img'];
$no = $_POST['phoneno'];

$query = $maru->query("UPDATE `student` SET `nisn`='$nisn',`nis`='$nis',`name`='$nm',`img`='$img',`idcls`='',`address`='$adr',`phoneno`='$no',`idspp`=' WHERE `nisn`='$nisn'");

if($query){
    header('location:staff.php');
}