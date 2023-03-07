<?php

session_start();

include('../connect.php');

$cls = $_POST['clsname'];
$scom = $_POST['skillcom'];
$sort = $_POST['skillsort'];

$query = $maru->query("INSERT INTO `class` VALUES ('','$cls','$scom', '$sort')");
$data = $query->fetch();

if($query){
    header('location:class.php');
}else{
    header('location:cls.php?error=$pesan_error');
}