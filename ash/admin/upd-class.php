<?php

session_start();

include('../connect.php');

$idc = $_GET['idcls'];
$query = $maru->query("SELECT * FROM class WHERE `idcls`=$idc");
$data = $query->fetch();

if(!isset($_SESSION['username'])){
    header("location:../login.php");
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
    <title>3</title>
    <style>
        .card{
            margin-top: 8%;
            margin-left: 20%;
            max-width: 800px;
            max-height: 500px;
            padding: 30px 30px 30px 30px;
            background-color: #f2f2f2;
            border-radius: 50px;
            box-shadow: 
                0 5px 9px 0 rgba(0, 0, 0, 0.2), 
                0 6px 20px 0 rgba(0, 0, 0, 0.20);
        }
    </style>
</head>
<body style="background-image: linear-gradient(to right, #DECBA4, #849FBD);font-family: 'Poppins', sans-serif;">
    <div class="card">
        <div class="card-body">
            <form action="upg-class.php" method="post">
                <div class="d-flex">
                    <ion-icon name="ribbon" style="font-size: 20px;"></ion-icon>&nbsp;
                    <h5 class="fw-bold">Add New Class</h5>
                </div>
                <hr class="divider">
                <input type="hidden" name="idcls" value="<?= $idc ?>">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="form-label" class="fw-bold mb-1">Class</label>
                                <input type="text" name="clsname" class="form-control rounded-3" placeholder="XXX" required value="<?= $data['clsname'];?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="form-label" class="fw-bold mb-1">Majority</label>
                                <input type="text" name="skillcom" class="form-control rounded-3" placeholder="your skill" required value="<?= $data['skillcom'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 d-flex" style="float: right;">
                    <a href="class.php" class="btn btn text-center text-light fw-bold shadow" style="background-color:#ba0000;border-radius:12px">Cancel</a>&emsp;
                    <button type="submit" class="btn btn text-center fw-bold shadow" style="background-color:#95CD41;border-radius:12px">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- end content  -->
    </div>
</div>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</body>
</html>