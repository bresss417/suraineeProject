<?php
    include('connect.php');
    $name = $_POST["name"];
    $last = $_POST["lastname"];
    $mail = $_POST["email"];
    $pass = $_POST["password"];
    $status = "user";

    $sql = "INSERT INTO users(name,lastname,email,password,status) VALUES('$name','$last','$mail','$pass','$status')";
    $que = mysqli_query($conn,$sql);
    if($que){
        echo "
        <script>
            alert('สมัครผู้ใช้เรียบร้อยแล้ว');
            window.location = 'index.php';
        </script>";   
    }else{
        echo "
        <script>
            alert('สมัครผู้ใช้ล้มเหลว');
            window.location = 'login.php';
        </script>";   
    }
?>