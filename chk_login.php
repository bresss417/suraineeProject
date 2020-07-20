<?php
    include('connect.php');
    session_start();

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password='$pass'";
    $que = mysqli_query($conn,$sql);
    $num = mysqli_fetch_assoc($que);
    $_SESSION['status'] = $num['status'];

    if($num['status'] == 'user'){
        $_SESSION['users'] = $num;
        echo "  
        <script>
            alert('login เรียบร้อย');
            window.location = 'index.php';
        </script>
        ";
    }else if($num['status'] == 'admin'){
        $_SESSION['users'] = $num;
        echo "  
            <script>
                alert('ยินดีต้อน คุณ admin');
                window.location = 'admin';
            </script>
        ";
    }else{
        echo "  
        <script>
            alert('email and password null');
            window.location = 'login.php';
        </script>
    ";
    }
?>