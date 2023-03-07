<?php

session_start();

include('../connect.php');
$query = $maru->query('SELECT * FROM staff')->fetchAll();

if(!isset($_SESSION['username'])){
  if ($_SESSION['level']=='admin'){
    header("location:login.php");
  }
}

$nisn = "";
if(isset($_GET['nisn'])){
  $nisn = $_GET['nisn'];
  $query = $maru->query("SELECT * FROM student where nisn='$nisn'")->fetch();
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
        background-image: linear-gradient(to right, #DECBA4, #849FBD);
      }
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 180px;
        border-radius: 20px;
        box-shadow: 
          3px 3px 3px 3px rgba(0, 0, 0, 0.08),
          -3px -3px 3px #fff;
        padding: 12px 16px;
        z-index: 1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
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
      .ivory{
            max-width: 1000px; 
            padding: 30px 30px 30px 30px;
            background-color: #f2f2f2;
            border-radius: 90px;
            box-shadow: 
                3px 3px 3px 3px rgba(0, 0, 0, 0.08), 
                -3px -3px 3px transparent;
            margin-left: 40px;
        }
        .card {
            background-color: #f2f2f2;
            border-radius: 60px;
            box-shadow: 
                0 5px 9px 0 rgba(1, 2, 1, 0.2), 
                0 6px 20px 0 rgba(0, 0, 0, 0.20);
            margin-left: 40px;
        }
        .hover-1{
            color:#0b0b0b;
        }
        .hover-1:hover {
            color: #3A98B9;
        }
    </style>
</head>
<body>
  <!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="profile">
      <center><img src="img/<?= $_SESSION['img']; ?>" class="hyv" width="100" alt=""></center>
      <p><center><?php echo $_SESSION['username'];?></center></p>
    </div>
    <a href="home.php"><ion-icon name="home"></ion-icon>&emsp;Home</a>
    <a href="history.php"><ion-icon name="hourglass"></ion-icon>&emsp;History</a>
    <a href="payment.php"><ion-icon name="wallet"></ion-icon>&emsp;Payment</a>
    <div class="dropdown">
      <a href="#"><ion-icon name="documents"></ion-icon>&emsp;Data</a>
      <div class="dropdown-content">
        <a href="student.php"><ion-icon name="people"></ion-icon>&emsp;Student</a>
        <a href="staff.php"><ion-icon name="id-card"></ion-icon>&emsp;Staff</a>
        <a href="spp.php"><ion-icon name="reader"></ion-icon>&emsp;SPP</a>
        <a href="class.php"><ion-icon name="book"></ion-icon>&emsp;Class</a>
      </div>
    </div>
    <a href="report.php"><ion-icon name="receipt"></ion-icon>&emsp;Report</a>
  </div> 
  <!-- end sidebar -->
  <!-- navbar -->
  <ul id="en">
    <img src="../totoro.png" class="img" width="35" height="35"> SPP Payment
    <a href="../logout.php" onclick="return confirm('Are You Sure?')" class="txt"><ion-icon name="log-out"></ion-icon></a>
  </ul>
  <!-- end navbar -->
  <span onclick="openNav()" class="to" ><ion-icon name="caret-forward"></ion-icon></span>
  <!-- content -->
  <div id="main">
  <div class="container">
      <div class="row">
         <div class="col bg-light ivory">
            <div class="container-fluid">
            <form action="cre-enpay.php" method="post">
            <div class="row">
                <div class="col">
                    <h4 class="fw-bold">Entry Payment</h4>
                </div>
                <div class="col text-end">
                    <span class="fw-bold">Date : </span>&nbsp;<input type="text" name="paydate" value="<?php echo date('y/m/d')?>" style="width:100px;float:right" class="form-control rounded-3" readonly>
                </div>
            </div>
                <!-- <div class="">
                    
                </div> -->
                <hr class="divider">
                <div class="mb-3 mt-2">
                <label for="form-label" class="fw-bold mb-1">NISN</label>
                        <select name="nisn" id="nisn" class="form-select" required onChange="getNisnSiswa()">
                        <option value="">Choose Class</option>
                          <?php $datas = $maru->query('SELECT * FROM student')->fetchAll();
                            foreach ($datas as $data) :?>
                                <option value="<?php echo $data['nisn']?>" <?=  $data['nisn'] === $nisn ? 'selected' : '' ?>><?php echo $data['nisn']?> - <?php echo $data['name']?></option>
                          <?php endforeach ?>
                        </select>
                </div>
                <div class="row">
                    <div class="col mt-2 mb-3">
                        <label for="form-label" class="fw-bold mb-1">Id SPP</label>
                        <input type="text" name="idspp" class="form-control rounded-3" value="<?= $nisn !== '' ? $query['idspp'] : '' ?>" readonly>
                    </div>
                    <div class="col mt-2 mb-3">
                        <label for="form-label" class="fw-bold mb-1">Id Staff</label>
                        <input type="text" name="idstaff" class="form-control rounded-3" value="<?= $_SESSION['idstaff']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col input-group mb-3 mt-3">									
                    <label class="input-group-text">										 	
                            SPP Pay Month	
                    </label>
                    <select class="form-select" name="paymonth">
                      <option selected></option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                    </div>
                    <div class="col input-group mb-3 mt-3">
                        <label class="input-group-text">Year</label>
                        <select name="payyear" class="form-select" size="1">
                            <option selected></option>
                            <?php
                                for ($i=2013;$i<=2024;$i++){
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="form-label" class="fw-bold mb-1">Pay Total</label>
                    <input type="name" name="payamount" id="rupiah" class="form-control rounded-3" placeholder="Rp 00000000" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="mb-3 btn btn fw-bold" style="float:right;border-radius:15px;background-color:#95CD41">Submit</button>
                </div>
            </form>
            </div>
         </div>
      </div>
    </div>
    <!-- end form  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
              <div class="container table-responsive">
                <div class="d-grip gap-2 col-12">
                <div class="card mt-5 mb-5"  style="width: 60rem;">
                <div class="card-body">
                <div class="card-tittle mt-2"><h4 class="fw-bold">Payment Data</h4></div>
                <table class="table table-borderless table-hover mt-4 text-center" style="border-radius: 20px;background:#fff;box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.08), 
                -3px -3px 3px #fff;;">
                <thead>
                    <tr style="font-family: 'DM Serif Display', serif;" class="fw-bold">
                        <th scope="col">No</th>
                        <th scope="col">Staff</th>
                        <th scope="col">Nisn Student</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Pay Total</th>
                        <th scope="col">Pay Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
                    $query = $maru->query('SELECT staff.namest, payment.idpay, payment.nisn, student.name, payment.payamount, payment.paydate FROM ((payment INNER JOIN staff ON payment.idstaff = staff.idstaff) INNER JOIN student ON payment.nisn = student.nisn);')->fetchAll();
                    $no=1;
                    
                    foreach ($query as $query):?>
                <tbody>
                    <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><a href="staff.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['namest']?></a></td>
                        <td><a href="student.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['nisn']?></a></td>
                        <td><a href="student.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['name']?></a></td>
                        <td><?=$query['payamount']?></td>
                        <td><?=$query['paydate']?></td>
                        <td>
                            <a href="del-enpay.php?idpay=<?=$query['idpay'];?>" class="btn btn-danger mb-3 btn-sm text-white" style="border-radius:10px"><ion-icon name="trash-bin" class="text-center" style="font-size: 20px;"></ion-icon></a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach ?>
                </table>
                </div>
                </div>
                </div>
             </div>  
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

  function getNisnSiswa(){
    var nisn = document.getElementById("nisn");
    var dataNisn = nisn.value;

   window.location = 'http://localhost/pspp/admin/payment.php?nisn=' + dataNisn
  }

  var rupiah = document.getElementById("rupiah");
  rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }
</script>
</body>
</html>