<?php

session_start();

if(isset($_SESSION['nisn'])){
    header("location:home.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icon  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
        .card{
            padding: 30px 30px 30px 30px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 
                3px 3px 3px 3px rgba(0, 0, 0, 0.08), 
                -3px -3px 3px transparent;
        }
        body{
        font-family: 'Poppins', sans-serif;
        background-image: linear-gradient(to right, #CCD6A6, #CEE5D0);
      }
    </style>
</head>
<body>
<div class="container" style="margin-top: 80px;">
  <div class="row">
  <?php if(isset($_GET['error'])) : ?>
      <div class="container-fluid">
        <div class="alert alert-danger text-center mb-3" style="width:340px;margin:auto;border-radius:30px" role="alert">
          <a href="login.php" class="btn btn-close" type="button" style="float: left;"></a>
          <span class="text-center fw-bold"><?= $_GET['error']?><ion-icon name="alert" class="fs-5"></ion-icon></span>
        </div>
      </div>
    <?php endif ?>
    <div class="col">
      <!-- Column -->
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
            <form action="enlog.php" method="post">
                <div class="d-flex">
                    <ion-icon name="sparkles" style="font-size: 30px;"></ion-icon>&nbsp;
                    <h3 class="fw-bold">SPP Payment</h3>
                </div>
                <h6 class="fw-normal"><em>Log into your account</em></h6>
                <hr class="divider">
                <div class="mb-3 mt-5">
                    <label for="form-label" class="fw-bold mb-1">Nisn</label>
                    <input type="text" name="nisn" class="form-control rounded-3" placeholder="000000" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn fw-bold" style="float:right;background-color:#3A98B9;color:white">Login</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col">
      <!-- Column -->
    </div>
  </div>
</div>
</body>
</html>