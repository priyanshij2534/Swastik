<?php
  require_once 'config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT distinct test_name FROM lab_tests WHERE test_name LIKE :tests';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['tests' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a>' . $row['test_name'] . '</a>';
      }
    } else {
      echo '<a>No Record Found</a>';
    }
  }
?>