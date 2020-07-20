<?php
    include('connect.php');
    session_start();
    if(!isset($_SESSION['users'])){
        echo "<script>
                alert('กรุณาเข้าสู่ระบบก่อน');
                window.location.href = 'login.php';
              </script>";
    }
    $sql ="SELECT * FROM stocks 
    INNER JOIN orders ON stocks.id = orders.p_id
    LEFT JOIN users ON users.id = orders.u_id";
    $re = mysqli_query($conn,$sql);
    
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
    <title>Document</title>
    <style>
        .purple-grad {
            background: #8200fb;
            background: -webkit-linear-gradient(left top,#8200fb,#c000ff);
            background: -o-linear-gradient(bottom right,#8200fb,#c000ff);
            background: -moz-linear-gradient(bottom right,#8200fb,#c000ff);
            background: linear-gradient(to bottom right,#8200fb,#c000ff);
        }
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
<div class="card">
    
<?php
if($re->num_rows > 0){
    if(isset($_SESSION['users'])){
        while($row = $re->fetch_assoc()){
            $u_id = $row['u_id'];
            if($_SESSION['users']['id'] == $u_id){
                $paymentDate = date('Y-m-d');
                $rental_date = $row['new_date'];
                $end_date_rental = $row['end_date'];
?>
    <table class="table table-striped" style="width:100%;margin-left:0%;border:1px solid yellow;">
        <tbody>
            <tr>
                <th><img src="data/<?php echo $row['b_photo']; ?>" width="100" height="100"></th>
                <th><?php echo $row['b_name']; ?></th> 
                <th><?php echo $row['details']; ?></th>
                <th><?php echo $row['price']; ?></th>
                <th><?php echo $row['new_date']; ?></th>
                <th><?php echo $row['end_date']; ?></th>
                <th>
        <?php   if(($paymentDate >= $rental_date) && ($paymentDate <= $end_date_rental)){    ?>
                  <div class="redus">
                    <p class="btn-success rounded-pill btn-sm">ยังไม่สิ้นสุด</p>
                  </div>
        <?php   }else{ ?>
                    <p class="btn-primary rounded-pill btn-sm">สิ้นสุดลงแล้ว</p>
        <?php    } ?>
                </th>
                <th>
        <?php   if(($paymentDate >= $rental_date) && ($paymentDate <= $end_date_rental)){    ?>
                    <p class=" btn-secondary btn-sm btn-lg active rounded-pill">ไม่สามารถลบได้</p>
        <?php   }else{ ?>
                    <a href="delete.php?o_id=<?php echo $row['o_id']; ?>" class="btn-danger btn-sm rounded-pill">ลบ</a>
        <?php    } ?>
                </th>
            </tr>
        </tbody>      
    </table>          
<?php
            }else{
?> 
            
</div>     
           
                <div class="row mt-5"   style="">
                    <div class="col-md-3 card h-100 text-white purple-grad align-item-center">
                        <div class="card-header animated ">
                            <i class="fa fa-frown-o" aria-hidden="true" style="font-size: 550%; color:black;margin-left:50px;"></i>
                            <h3 class="">เสียใจด้วยคุณยังไม่ได้เช่าสินค้า</h3>
                        </div>
                    </div>
                </div>
            </div>
<?php
                return;
            }
        }
    }else{
        echo "NO users!!";
    }
  $conn->close();
}
?>
     
</body>
</html>