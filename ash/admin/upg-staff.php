<?php

session_start();

include('../connect.php');

$id = $_POST['idstaff'];
$nm = $_POST['namest'];
$usn = $_POST['username'];
$pw = $_POST['password'];
$img = $_POST['img'];
$lvl = $_POST['level'];

$query = $maru->query("UPDATE `staff` SET `namest`='$nm',`username`='$usn',`password`='$pw',`img`='$img',`level`='$lvl' WHERE `idstaff`='$id'");

if($query){
    header('location:staff.php');
}