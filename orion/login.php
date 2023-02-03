<?php
session_start();

if(isset($_SESSION['username'])){
  if ($_SESSION['role']=='admin'){
    header("location:admin/rumah.php");
  }
  if ($_SESSION['role']=='student'){
    header("location:student/home.php");
  }
  if ($_SESSION['role']=='staff'){
    header("location:staff/home.php");
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <section class="min-vh-100" style="background-color: #849FBD;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center">
      <div class="col col-5">
        <?php if(isset($_GET['error'])) : ?>
          <div class="container-fluid">
            <div class="alert alert-danger text-center" style="width: 500px;margin:auto" role="alert">
          <a href="login.php" class="btn btn-close" type="button" style="float: left;"></a>
          <span class="text-center"><?= $_GET['error']?></span>
          </div>
        </div>
        <?php endif ?>
        <div class="card text-dark" style="border-radius: 2rem;">
            <div class="col-lg-7 d-flex">
              <div class="card-body">
                <form action="enlog.php" method="post">
                  <div class="d-flex mb-3">
                    <ion-icon name="sparkles" style="font-size: 20px;"></ion-icon>&nbsp;
                    <span class="fs-3 fw-bold">SPP Payment</span>
                  </div>
                    <h5 class="fw-normal mb-3" style="letter-spacing: 1px;">Log into your account</h5>
                  <div class=" mb-4">
                    <input type="text" name="username" class="form-control"/>
                    <label class="form-label" required>Username</label>
                  </div>

                  <div class="mb-4">
                    <input type="password"  name="password" class="form-control " />
                    <label class="form-label" required>Password</label>
                  </div>

                  <div class=" mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>