<?php
    include('connect.php');
    session_start();

    $sql = "SELECT * FROM stocks LIMIT 4";
    $query = mysqli_query($conn,$sql);
    

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
    <title>Home Page</title>
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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">รายการชุด </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="man.php">ชุดแต่งงานสุภาพบุรุษ</a>
                            <a class="dropdown-item" href="woman.php">ชุดแต่งงานสุภาพสตรี</a>
                        </div>
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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="public/img/back-image.jpg" height="500" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-dark font-weight-bolder">text header</h1>
        <h3 class="text-dark">text detail1</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="public/img/back.jpg" height="500" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-dark font-weight-bolder">text header</h1>
        <h3 class="text-dark">text detail2</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="public/img/img.jpg" height="500" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-dark font-weight-bolder">text header</h1>
        <h3 class="text-dark">text detail3</h3>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


  <div class="row mt-5"> 
<?php
    while($row = mysqli_fetch_assoc($query)){
?>
    <div class="col-md-3 text-center">
        <div class="card-header animated ">
             <img src="data/<?php echo $row["b_photo"]; ?>" class="img-fluid" style="width:80%;height:70%">
             <h4 class="title"><?php echo $row["b_name"]; ?></h4>
             <h5 class="body"><?php echo $row["details"]; ?></h5>
             <p class="price">ราคา : <?php echo $row["price"]; ?></p>
             <a class="btn btn-success" href="list.php?id=<?php echo $row['id']; ?>">ปุ่มเช่า</a>
        </div>
    </div>
<?php } ?> 
  </div> 
</div>

</body>
</html>