<?php
    include_once 'configuration.php';

    if(isset($_POST['booking'])){
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient-name']);
        $patient_email = mysqli_real_escape_string($conn, $_POST['patient-email']);
        $patient_phone = mysqli_real_escape_string($conn, $_POST['patient-phone']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $visit_type = mysqli_real_escape_string($conn, $_POST['visit-type']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        session_start();
        $user_id = $_SESSION['user_id'];
        $price = $_SESSION['price'];
        $test_id = $_SESSION['booking_test_id'];
        $test_name = $_SESSION['booking_test_name'];
        
        $query = "INSERT INTO current_test_orders (user_id, test_id, patient_name, patient_email, patient_number, date, time, gender, address, city, details, visit_type, test_name, price) VALUES ('$user_id', '$test_id', '$patient_name', '$patient_email', '$patient_phone', '$date', '$time', '$gender', '$address', '$city', '$details', '$visit_type', '$test_name', '$price')" or die('query failed');
        $booking = mysqli_query($conn, $query);
        
        if($booking){
            $message[] = 'Visit Booked!';
            header('location:lab-test.php');
        }
        else{
            echo "<script> alert('failed to connect'); </script>";
        }
    }   
?>