<?php
 include('connect.php');
$id = $_GET['o_id'];
$de = "DELETE FROM orders WHERE o_id='$id' LIMIT 1 ";
    $re = mysqli_query($conn,$de);
        if($re){
            echo "
            <script>
                alert('ลบ เรียบร้อย');
                window.location = 'orders.php';
            </script>
            ";
        }else{
            echo "Error Delete [".$de."]";
        }
        mysqli_close($conn);

    
?>