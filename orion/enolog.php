<?php

session_start();

include('connect.php');

$nisn = $_POST['nisn'];

$query = $maru->query("SELECT * FROM student WHERE nisn='$nisn' ");
$data = $query->fetch();

if($query->rowCount()>0){
    $_SESSION['nisn'] = $nisn;
    header("location:student/home.php");
}else {
    echo "gak bisa";
    // header("location:logins.php");
}