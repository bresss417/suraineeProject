<?php
    
    $conn = new mysqli("localhost","root","","test");
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
        echo "not connect !";
    }
?>