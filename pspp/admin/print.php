<?php
  
  session_start();

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
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
            font-size: 14px;
        }

        img {
            max-width: 100%;
        }

        body { 
            background-image: linear-gradient(to right, #DECBA4, #849FBD);
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6;
        }

        /* Let's make sure all tables have defaults */
        table td {
            vertical-align: top;
        }

        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .body-wrap {
            background-image: linear-gradient(to right, #DECBA4, #849FBD);
            width: 100%;
        }

        .container {
            display: block !important;
            max-width: 600px !important;
            margin: 0 auto !important;
            /* makes it centered */
            clear: both !important;
        }

        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
            padding: 20px;
        }

        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #fff;
            border: 1px solid #e9e9e9;
            border-radius: 3px;
        }

        .content-wrap {
            padding: 20px;
        }

        .content-block {
            padding: 0 0 20px;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }


        h1, h2, h3 {
            color: #000;
            margin: 40px 0 0;
            line-height: 1.2;
            font-weight: 400;
        }

        p, ul, ol {
            margin-bottom: 10px;
            font-weight: normal;
        }
        p li, ul li, ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        a {
            color: #1ab394;
            text-decoration: underline;
        }

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .aligncenter {
            text-align: center;
        }

        .alignright {
            text-align: right;
        }

        .alignleft {
            text-align: left;
        }
        
        .invoice {
            margin: 40px auto;
            text-align: left;
            width: 80%;
        }
        .invoice td {
            padding: 5px 0;
        }
        .invoice .invoice-items {
            width: 100%;
        }
        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }
        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        @media only screen and (max-width: 640px) {
            h1, h2, h3, h4 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .container {
                width: 100% !important;
            }

            .content, .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
        @media only print{
            .print{
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
        include('../connect.php');
                    
        $id = $_GET['idpay'];
        
        $query = $maru->query("SELECT * FROM payment INNER JOIN staff ON payment.idstaff = staff.idstaff INNER JOIN student ON payment.nisn = student.nisn INNER JOIN class ON student.idcls = class.idcls WHERE payment.idpay = $id")->fetchAll();
        foreach ($query as $datas) {
        ?>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                    <a href="report.php" class="print btn btn-close mt-2 mb-2"></a>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="content-block">
                                            <h2 class="fw-bold">Payment SPP</h2>
                                        </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                                <tr>
                                                    <td style="float:left">Date : <?php echo date('d/m/y') ?><br>ID Pay : <?= $datas['idpay'] ?></td>
                                                    <td style="float:right"><?= $datas['idstaff']?> - <?= $datas['namest']?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bold">Student Name : <?= $datas['name']?><br></td>
                                                </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr class="fw-bold">
                                                            <td >NISN</td>
                                                            <td class="alignright"><?= $datas['nisn']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Class</td>
                                                            <td class="alignright"><?= $datas['clsname']?> <?= $datas['skillsort']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Month & Year Paid</td>
                                                            <td class="alignright"><?= $datas['paymonth']?> - <?= $datas['payyear']?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td width="70%">Total :</td>
                                                            <td class="alignright"><?=$datas['payamount']?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td><button class="print btn btn-dark mb-3 btn-sm text-white fw-bold"><ion-icon name="print" onclick="window.print()" style="font-size: 20px;border-radius:50%"></ion-icon></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody></table>
        </div>
        </td>
        <td></td>
    </tr>
</tbody>
<?php } ?>
</table>
</body>
</html>