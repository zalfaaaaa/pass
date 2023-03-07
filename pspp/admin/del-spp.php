<?php

session_start();

include('../connect.php');

$ids = $_GET['idspp'];

$query = $maru->query("DELETE FROM `spp` WHERE `idspp`=$ids");

if($query){
    header('location:spp.php');
}else {
    header('location:spp.php?error=cannot delete');
}