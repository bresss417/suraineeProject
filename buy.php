<?php

include "config.php";
session_start();

if (!isset($_SESSION["user"])) {
?>
<script>
    alert("กรุณาเข้าสู่ระบบก่อน");
    window.location.href = "home.php";
</script>
<?php
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/mains.css" rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">กรอกข้อมูลการสั่งซื้อ</h2>
                </div>
                <div class="card-body">
                <form action="chk_order.php" method="post">
                        <input type='hidden' name='b_id' value='<?php echo $_GET["id"]; ?>'>
                        <div class="form-row">
                            <div class="name">ชื่อ</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="names"  placeholder="ชื่อ" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">นามสกุล</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="lastname" placeholder="นามสกุล" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">ที่อยู่</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="address" placeholder="ที่อยู่" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">อีเมล</div>
                            <div class="value">
                            <div class="input-group">
                                    <input class="input--style-6" type="text" name="email" placeholder="example@email.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">เบอร์โทรศัพท์</div>
                            <div class="value">
                            <div class="input-group">
                                    <input class="input--style-6" type="text" name="phone" placeholder="เบอร์โทรศัพท์" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">สั่งซื้อ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Jquery JS-->
     <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>