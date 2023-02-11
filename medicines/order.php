<?php
    include_once 'configuration.php';

    if(isset($_POST['order'])){
        $quantity = $_POST['quantity'];

        session_start();
        $user_id = $_SESSION['user_id'];
        $medicine_id = $_SESSION['medicine_id'];
        $med_name = $_SESSION['med_name'];
        $price = $_SESSION['medicine_price'];

        $net_price = $quantity * $price;

        $query = "INSERT INTO current_orders (user_id, product_id, quantity, price, net_price, medicine_name) VALUES ('$user_id', '$medicine_id', '$quantity', '$price', '$net_price', '$med_name' )";
        $booking = mysqli_query($conn, $query);
        
        if($booking){
            $message[] = 'Visit Booked!';
            header('location:medicines.php');
        }
        else{
            echo "<script> alert('failed to connect'); </script>";
            header('location:medicines.php');
        }
    }   
?>