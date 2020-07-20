<?php
    include('connect.php');

    $n = $_POST['name'];
    $l = $_POST['last'];
    
    $h1 = $_POST['h1'];
    $h2 = $_POST['h2'];
    $h3 = $_POST['h3'];
    $h4 = $_POST['h4'];
    $h5 = $_POST['h5'];
    $code_h = $_POST['code_h'];

    $user = join(array($n," ",$l));
    $address = join(array($h1," ",$h2," ",$h3," ",$h4," ",$h5," ",$code_h));
    $p_id = $_POST['b_id'];
    $u_id = $_POST['u_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $new = date('y/m/d');
    $end = $_POST['end_date'];

    $sql = "INSERT INTO orders(username,address,email,phone,new_date,end_date,p_id,u_id)
            VALUES('$user','$address','$email','$phone','$new','$end','$p_id','$u_id')";
    $que = mysqli_query($conn,$sql);
    if($que){
        echo "
        <script>
            alert('สั่งซื้อเรียบร้อยแล้ว');
            window.location = 'index.php';
        </script>"; 
          
    }else{
        echo "
        <script>
            alert('ไม่สามารถสั่งซื่อได้');
            window.location = 'list.php';
        </script>";
        
    }
?>