<?php
    include_once 'configuration.php';

    if(isset($_POST['order'])){
        $quantity = $_POST['quantity'];

        session_start();
        $user_id = $_SESSION['user_id'];
        $product_id = $_SESSION['product_id'];
        $product_name = $_SESSION['product_name'];
        $price = $_SESSION['product_price'];

        $net_price = $quantity * $price;

        $query = "INSERT INTO current_product_orders (user_id, product_id, quantity, price, net_price, product_name) VALUES ('$user_id', '$product_id', '$quantity', '$price', '$net_price', '$product_name')";
        $booking = mysqli_query($conn, $query);
        
        if($booking){
            $message[] = 'Visit Booked!';
            header('location: ../searching/search.php');
        }
        else{
            echo "<script> alert('failed to connect'); </script>";
            header('location:../searching/search.php');
        }
    }   
?>