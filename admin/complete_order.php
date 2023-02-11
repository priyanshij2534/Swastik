<?php
    require_once 'config.php';

    if (isset($_POST['complete-product'])) {
        $product_order_id = $_POST['complete-product'];

        $selcet = mysqli_query($conn, "SELECT * FROM `current_product_orders` WHERE product_order_id = '$product_order_id'");
        $row = mysqli_fetch_assoc($selcet);

        $user_id = $row['user_id'];
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $net_price = $row['net_price'];
        $product_name = $row['product_name'];


        $insert = mysqli_query($conn, "INSERT INTO completed_product_orders (user_id, product_id, quantity, price, net_price, product_name, product_order_id) VALUES ('$user_id', '$product_id', '$quantity', '$price', '$net_price', '$product_name', '$product_order_id')");
    
        $query = mysqli_query($conn, "DELETE FROM current_product_orders WHERE product_order_id = '$product_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-medicine'])) {
        $medicine_order_id = $_POST['complete-medicine'];

        $selcet = mysqli_query($conn, "SELECT * FROM `current_orders` WHERE medicine_order_id = '$medicine_order_id'");
        $row = mysqli_fetch_assoc($selcet);

        $user_id = $row['user_id'];
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $net_price = $row['net_price'];
        $medicine_name = $row['medicine_name'];


        $insert = mysqli_query($conn, "INSERT INTO completed_orders (medicine_order_id, user_id, product_id, quantity, price, net_price, medicine_name) VALUES ('$medicine_order_id', '$user_id', '$product_id', '$quantity', '$price', '$net_price', '$medicine_name')");
    
        $query = mysqli_query($conn, "DELETE FROM current_orders WHERE medicine_order_id = '$medicine_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-test'])) {
        $test_order_id = $_POST['complete-test'];

        $selcet = mysqli_query($conn, "SELECT * FROM `current_test_orders` WHERE test_order_id = '$test_order_id'");
        $row = mysqli_fetch_assoc($selcet);

        $user_id = $row['user_id'];
        $test_id = $row['test_id'];
        $patient_name = $row['patient_name'];
        $patient_email = $row['patient_email'];
        $date = $row['date'];
        $address = $row['address'];
        $city = $row['city'];
        $visit_type = $row['visit_type'];
        $test_name = $row['test_name'];
        $price = $row['price'];

        $insert = mysqli_query($conn, "INSERT INTO completed_test_orders (test_order_id, user_id, test_id, patient_name, patient_email, date, address, city, visit_type, test_name, price) VALUES ('$test_order_id', '$user_id', '$test_id', '$patient_name', '$patient_email', '$date', '$address', '$city', '$visit_type', '$test_name', '$price')");
    
        $query = mysqli_query($conn, "DELETE FROM current_test_orders WHERE test_order_id = '$test_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-subscription'])) {
        $registration_id = $_POST['complete-subscription'];

        $selcet = mysqli_query($conn, "SELECT * FROM `current_gym_registration` WHERE registration_id = '$registration_id'");
        $row = mysqli_fetch_assoc($selcet);

        $user_id = $row['user_id'];
        $name = $row['name'];
        $email = $row['email'];
        $gymType = $row['gymType'];
        $date = $row['date'];
        $subscription_time = $row['subscription_time'];
        $price = $row['price'];

        $insert = mysqli_query($conn, "INSERT INTO completed_gym_registration (registration_id, user_id, name, email, gymType, date, subscription_time, price) VALUES ('$registration_id', '$user_id', '$name', '$email', '$gymType', '$date', '$subscription_time', '$price')");
    
        $query = mysqli_query($conn, "DELETE FROM current_gym_registration WHERE registration_id = '$registration_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-appointent'])) {
        $appointment_id = $_POST['complete-appointent'];

        $selcet = mysqli_query($conn, "SELECT * FROM `current_appointment` WHERE appointment_id = '$appointment_id'");
        $row = mysqli_fetch_assoc($selcet);

        $user_id = $row['user_id'];
        $doctor_name = $row['doctor_name'];
        $patient_name = $row['patient_name'];
        $patient_email = $row['email'];
        $appointment_date = $row['appointment_date'];

        $insert = mysqli_query($conn, "INSERT INTO completed_appointment (appointment_id, user_id, doctor_name, patient_name, patient_email, appointment_date) VALUES ('$appointment_id', '$user_id', '$doctor_name', '$patient_name', '$patient_email', '$appointment_date')");
    
        $query = mysqli_query($conn, "DELETE FROM current_appointment WHERE appointment_id = '$appointment_id' ");
        header('location:orders.php');
    }

?>