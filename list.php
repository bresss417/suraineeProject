<?php
    include('connect.php');
    session_start();

    if(!isset($_SESSION['users'])){

      echo "<script>
      alert('กรุณาเข้าสู่ระบบก่อน');
      window.location.href = 'login.php';
      </script>";

    exit();
    }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="public/css/index.css">
    <title>List Page</title>
    <style>
    
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark teal mb-4">
    <i class="fa fa-home" aria-hidden="true" style="font-size: 350%; color:white;"></i> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">รายการเช่า</a>
                </li>
                <li>

                </li>
            </ul>
        
            <ul class="navbar-nav ml-auto">
    <?php
        if(isset($_SESSION["users"])){
    ?>
            
                <li class="nav-item active" style="color:white;margin-top:15px;">
                    <p class="" >
                        <?php echo $_SESSION["users"]["name"]; ?>&nbsp; <?php echo $_SESSION["users"]["lastname"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </li>
                <li class="nav-item ">
                    <a class="btn btn-default btn-outline btn-circle" href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        logout <span class="sr-only">(current)</span>
                    </a>
                </li>
            
    <?php
        }else{
    ?>
                <li class="nav-item ">
                    <a class="btn btn-default btn-outline btn-circle" href="login.php">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;
                        login <span class="sr-only">(current)</span>
                    </a>
                </li>
    <?php
        }
    ?>
            </ul>
        </div>     
</nav>
<div class="container">
  <div class="row justify-content-center">
	<div class="col-md-6">
      <div class="card">
        <header class="card-header">
	     <h4 class="card-title mt-2">กรอกข้อมูลการสั่งซื่อ</h4>
        </header>
        <article class="card-body">
          <form action="chk_list.php" method="POST" role="form">
            <input type='hidden' name='b_id' value='<?php echo $_GET["id"]; ?>'>
            <input type='hidden' name='u_id' value='<?php echo $_SESSION["users"]["id"]; ?>'>
            
            <div class="form-row" style="border:1px solid black;margin-bottom:15px;height:50px">
              <div class="value">
                <input class="input--style-6" type="text" name="name"  placeholder="ชื่อ" required>
              </div>
               <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
              <div class="value">
                <input class="input--style-6" type="text" name="last"  placeholder="นามสกุล" required>
              </div>
            </div>
            
            <div class="form-row" style="border:1px solid black;margin-bottom:15px;height:100px">
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="h1"  placeholder="บ้านเลขที่" required>
              </div>
               <p>&nbsp;&nbsp;&nbsp;</p>
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="h2"  placeholder="หมุ่บ้าน" required>
              </div>
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="h3"  placeholder="ตำบล" required>
              </div>
               <p>&nbsp;&nbsp;&nbsp;</p>
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="h4"  placeholder="อำเภอ" required>
              </div>
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="h5"  placeholder="จังหวัด" required>
              </div>
               <p>&nbsp;&nbsp;&nbsp;</p>
              <div class="value col-md-3">
                <input class="input--style-6" type="text" name="code_h"  placeholder="รหัสไปร์ษณีย์" required>
              </div>
            </div>
                <input type="hidden" name="email" value="<?php echo $_SESSION["users"]["email"]; ?>">
            <div class="form-row" style="border:1px solid black;margin-bottom:5px;height:50px">
              <div class="value col-md-10">
                <input class="input--style-6" type="text" name="phone"  placeholder="เบอร์โทร" required>
              </div>
            </div>
            <div class="form-row" style="border:1px solid black;margin-bottom:5px;height:70px">
              
                <p style="padding-top:20px;font-size:20px;">สิ้นสุดวันที่เช่า : &nbsp;&nbsp;&nbsp;</p>
              
              <div class="form-group col-md-6">
                <input type="date" class="form-control" name="end_date" placholder="">
              </div>
            </div>

            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="ตกลง"> 
            </div>
          </form>
          
        </article>
      </div>
    </div>
  </div>
</div>

</body>
</html>
