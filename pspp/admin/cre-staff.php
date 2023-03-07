<?php

session_start();

include('../connect.php');

$nm = $_POST['namest'];
$usn = $_POST['username'];
$pw = $_POST['password'];
$lvl = $_POST['level'];
$im = $_POST['img'];

$query = $maru->query("INSERT INTO `staff` (`idstaff`, `namest`, `username`, `password`, `img`, `level`) VALUES('', '$nm', '$usn', '$pw', '$lvl', '$img')");
$data = $query->fetch();

if($query){
    header('location:staff.php');
}else{
    header('location:newstaff.php?error=$pesan_error');
}