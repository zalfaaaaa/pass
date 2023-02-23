<?php

session_start();

include('../connect.php');

$ids = $_GET['idspp'];
$query = $maru->query("SELECT * FROM spp WHERE `idspp`=$ids");
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
        .cardBox{
            position: relative;
            width: 100%;
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            grid-gap: 30px;
        }
        .cardBox .card1{
            position: relative;
            background:#1d1d1d;
            color: white;
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 8px 26px rgba(0, 0, 0, 0.09);
        }
        .cardBox .card1 :hover{
            background: #1e1e1e;
            color: #fff;
        }
        .card{
            margin-top: 8%;
            margin-left: 35%;
            max-width: 350px;
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
<body>
<div class="card">
        <div class="card-body">
            <form method="post" action="upg-spp.php">
                <div class="d-flex">
                    <ion-icon name="file-tray-stacked" style="font-size: 20px;"></ion-icon>&nbsp;
                    <h5 class="fw-bold">New Data</h5>  
                </div>
                <hr class="divider">
                <input type="hidden" name="idspp" value="<?=$ids?>">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="form-label" class="fw-bold mb-1">Year</label>
                                <select name="year" class="form-select" size="1">
                                    <?php
                                        for ($i=1999;$i<=2023;$i++){
                                            echo "<option selected> </option>";
                                            echo "<option value=".$i.">".$i."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="form-label" class="fw-bold mb-1">Nominal</label>
                                <input type="text" name="nominal" class="form-control rounded-3" value="<?= $data['nominal'];?>" placeholder="Rp 000000000" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 d-flex" style="float: right;">
                    <a href="spp.php" class="btn btn text-center text-light fw-bold shadow" style="background-color:#ba0000;border-radius:12px">Cancel</a>&emsp;
                    <button type="submit" class="btn btn text-center fw-bold shadow" style="background-color:#95CD41;border-radius:12px">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>