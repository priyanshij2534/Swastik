<?php
  require_once 'config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql1 = 'SELECT distinct medicine_name FROM medicines WHERE medicine_name LIKE :medicines';
    $stmt = $conn->prepare($sql1);
    $stmt->execute(['medicines' => '%' . $inpText . '%']);
    $result1 = $stmt->fetchAll();

    $sql2 = 'SELECT distinct test_name FROM lab_tests WHERE test_name LIKE :tests';
    $stmt = $conn->prepare($sql2);
    $stmt->execute(['tests' => '%' . $inpText . '%']);
    $result2 = $stmt->fetchAll();

    $sql3 = 'SELECT distinct product_name FROM healthcare_products WHERE product_name LIKE :product';
    $stmt = $conn->prepare($sql3);
    $stmt->execute(['product' => '%' . $inpText . '%']);
    $result3 = $stmt->fetchAll();

    if ($result1 || $result2 || $result3) {
      foreach ($result1 as $row) {
        echo '<a>' . $row['medicine_name'] . '</a>';
      }
      foreach ($result2 as $row) {
        echo '<a>' . $row['test_name'] . '</a>';
      }
      foreach ($result3 as $row) {
        echo '<a>' . $row['product_name'] . '</a>';
      }
    } 
    else {
      echo '<a>No Record Found</a>';
    }
  }
?>