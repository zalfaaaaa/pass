<?php

session_start();

include('../connect.php');

$nisn = $_SESSION['nisn'];
$query = $maru->query("SELECT * FROM student INNER JOIN class ON student.idcls = class.idcls INNER JOIN spp ON student.idspp = spp.idspp WHERE student.nisn = $nisn;")->fetchAll();

if(!isset($_SESSION['nisn'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
    <style>
      /* The side navigation menu */
      .sidenav {
        height: 100%; /* 100% Full-height */
        width: 0; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #f5f5f5; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
      }

      /* The navigation menu links */
      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
        color: #1d1d1d;
        display: block;
        transition: 0.3s;
      }

      /* When you mouse over the navigation links, change their color */
      .sidenav a:hover {
        color: #000080;
      }
      /* Position and style the close button (top right corner) */
      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 5px;
        font-size: 36px;
        margin-left: 95px;
      }
      /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
      #main {
        transition: margin-left .5s;
        padding: 20px;
      }
      #en {
        transition: margin-left .5s;
        padding: 5px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
      .to{
        font-size: 50px;
        color: white;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-size: 20px;
        font-weight: bold;
        background-color: #f5f5f5;
      }
      li {
        float: left;
      }
      .img{
        margin-top: 6px;
        margin-left: 16px;
        margin-bottom: 2px;
      }
      .profile{
        font-size: 20px;
        font-weight: bold;
      }
      .hyv{
        border-radius: 50%;
      }
      body{
        font-family: 'Poppins', sans-serif;
        background-image: linear-gradient(to right, #CCD6A6, #CEE5D0);
      }
      .txt{
        float: right;
        color: #ba0000;
        text-decoration: none;
        margin-top: 4px;
        margin-bottom: 4px;
        font-size: 30px;
        margin-right: 20px;
      }
    </style>
</head>
<body>
  <!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="profile">
      <center><img src="../admin/img/<?= $_SESSION['img']?>" class="hyv" width="100" alt=""></center>
      <p><center><?php echo $_SESSION['name'];?></center></p>
    </div>
    <a href="home.php"><ion-icon name="home"></ion-icon>&emsp;Home</a>
    <a href="history.php"><ion-icon name="hourglass"></ion-icon>&emsp;History</a>
  </div> 
  <!-- end sidebar -->
  <!-- navbar -->
  <ul id="en">
    <img src="../totoro.png" class="img" width="35" height="35"> SPP Payment
    <a href="logout.php" onclick="return confirm('Are You Sure?')" class="txt"><ion-icon name="log-out"></ion-icon></a>
  </ul>
  <!-- end navbar -->
  <span onclick="openNav()" class="to" ><ion-icon name="caret-forward"></ion-icon></span>
  <!-- content -->
  <div id="main">
  <h5 class="fw-bold text-center"> Welcome Back Dear Beloved <?= $_SESSION['name']?> ❕</h5>
  <div class="card" style="border-radius:25px;margin-left:10%;margin-right:10%">
    <div class="card-body">
      <h2 class="fw-bold" style="font-family:'Times New Roman', Times, serif">Profile</h2>
      <hr class="divider">
      <ul class="list-group list-group-flush" style="font-size: 18px;">
        <?php foreach ($query as $datas):?>
          <li class="list-group-item">NISN&emsp;&emsp;: <?= $datas['nisn']?></li>
          <li class="list-group-item">NIS &nbsp;&emsp;&emsp;: <?= $datas['nisn']?></li>
          <li class="list-group-item">Name&emsp;: <?= $datas['name']?></li>
          <li class="list-group-item">Class &emsp;:  <?= $datas['clsname']?> - <?= $datas['skillcom']?> (<?= $datas['skillsort']?>)</li>
          <li class="list-group-item">SPP&emsp;&emsp; :  <?= $datas['idspp']?> - <?= $datas['year']?></li>
        <?php endforeach?>
      </ul>
    </div>
  </div>
  </div>
<script>
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
  function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("en").style.marginLeft = "200px";
  }
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("en").style.marginLeft = "0";
  }
</script>
</body>
</html>