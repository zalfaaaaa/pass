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
        body{
            background-image: linear-gradient(to right, #DECBA4, #849FBD);
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
                                    <option value="2013" <?= $data['year'] == '2013' ? 'selected' : '' ?>>2013</option>
                                    <option value="2014" <?= $data['year'] == '2015' ? 'selected' : '' ?>>2014</option>
                                    <option value="2015" <?= $data['year'] == '2015' ? 'selected' : '' ?>>2015</option>
                                    <option value="2016" <?= $data['year'] == '2016' ? 'selected' : '' ?>>2016</option>
                                    <option value="2017" <?= $data['year'] == '2017' ? 'selected' : '' ?>>2017</option>
                                    <option value="2018" <?= $data['year'] == '2018' ? 'selected' : '' ?>>2018</option>
                                    <option value="2019" <?= $data['year'] == '2019' ? 'selected' : '' ?>>2019</option>
                                    <option value="2020" <?= $data['year'] == '2020' ? 'selected' : '' ?>>2020</option>
                                    <option value="2021" <?= $data['year'] == '2021' ? 'selected' : '' ?>>2021</option>
                                    <option value="2022" <?= $data['year'] == '2022' ? 'selected' : '' ?>>2022</option>
                                    <option value="2023" <?= $data['year'] == '2023' ? 'selected' : '' ?>>2023</option>
                                    <option value="2024" <?= $data['year'] == '2034' ? 'selected' : '' ?>>2024</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="form-label" class="fw-bold mb-1">Nominal</label>
                                <input type="text" name="nominal"  id="rupiah" class="form-control rounded-3" value="<?= $data['nominal'];?>" placeholder="Rp 000000000" required>
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
  <script>
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