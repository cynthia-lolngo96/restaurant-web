<?php
$username = $_POST['username'];
$number = $_POST['number'];
$orders = $_POST['orders'];
$food = $_POST['food'];
$price = $_POST['price'];
$datetime = $_POST['datetime'];
$address = $_POST['address'];
$message = $_POST['message'];

if( ! empty($username) || ! empty($number) || ! empty($orders) ||
! empty($food) || ! empty($price) || ! empty($datetime) ||
! empty($address) ||  ! empty($message)){
     $host = "localhost";
     $dbUsername = "root";
     $dbPassword ="";
     $dbname ="mysql";

     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

     if(mysqli_connect_err()){
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

     }
     else{
         $INSERT = "INSERT into register(username,number,orders,food,
         price,datetime,address,message) values(?, ?, ?, ?, ?, ?, ?, ?)";
        
        if($rnum==0){
            $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("sissiiss", $username, $number, $orders, $food, $price, $datetime, $address, $message);
         $stmt->execute();
         echo "New record inserted successfully";
        } else{
            echo "Someone already registered using this name";
        }
        $stmt->close();
        $conn->close();

    
    }

}
else{
    echo "All field are required";
    die();
}

?>