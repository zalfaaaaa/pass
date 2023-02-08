<?php

session_start();

include('../connect.php');

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nm = $_POST['name'];
$img = $_POST['img'];
$adr = $_POST['address'];
$no = $_POST['phoneno'];

$query = $maru->query("INSERT INTO `student`VALUES (`$nisn`, `$nis`, `$nm`, `$img`, `102`, `$adr`, `$no`, `112`)");
$data = $query->fetch();

if($query){
    header('location:student.php');
}else{
    header('location:newstudent.php?error=$pesan_error');
}