<?php
    require_once 'config.php';

    if (isset($_POST['complete-product'])) {
        $product_order_id = $_POST['complete-product'];
        $query = mysqli_query($conn, "DELETE FROM current_product_orders WHERE product_order_id = '$product_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-medicine'])) {
        $medicine_order_id = $_POST['complete-medicine'];
        $query = mysqli_query($conn, "DELETE FROM current_orders WHERE medicine_order_id = '$medicine_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-test'])) {
        $test_order_id = $_POST['complete-test'];
        $query = mysqli_query($conn, "DELETE FROM current_test_orders WHERE test_order_id = '$test_order_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-subscription'])) {
        $registration_id = $_POST['complete-subscription'];
        $query = mysqli_query($conn, "DELETE FROM current_gym_registration WHERE registration_id = '$registration_id' ");
        header('location:orders.php');
    }

    else if (isset($_POST['complete-appointent'])) {
        $appointment_id = $_POST['complete-appointent'];
        $query = mysqli_query($conn, "DELETE FROM current_appointment WHERE appointment_id = '$appointment_id' ");
        header('location:orders.php');
    }

?>