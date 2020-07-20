<?php
    include('connect.php');
    session_start();
    if(isset($_SESSION["users"])){
        
        
    }
    $sql ="SELECT * FROM stocks 
         INNER JOIN orders ON stocks.id = orders.p_id
         LEFT JOIN users ON users.id = orders.u_id";
    $re = mysqli_query($conn,$sql);
    
    
        while($row = mysqli_fetch_assoc($re)){
            $u_id = $row['u_id'];
            if(isset($_SESSION['users'])){
                if($_SESSION['users']['id'] == $u_id){
                    echo $row['b_name'],"<br>";
                    $d = date("y-m-d");
                    
                    $dd = date("Y-m-d",strtotime("now"));
                    echo $dd;
                    
                }else{
                    echo "error";
                    echo "<br>";
                    echo date(y/m/d);
                    return;
                }
            }else{
                echo "no users";
            }
            
        }
   
    
?>