<?php

session_start();

include('../connect.php');

$id = $_POST['idcls'];
$cls = $_POST['clsname'];
$scom = $_POST['skillcom'];
$sort = $_POST['skillsort'];

$query = $maru->query("UPDATE `class` SET `clsname`='$cls',`skillcom`='$scom', `skillsort`='$sort' WHERE `idcls`='$id'");
$data = $query->fetch();

if($query){
    header('location:class.php');
}else{
    header('location:cls.php?error=$pesan_error');
}