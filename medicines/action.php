<?php
  require_once 'config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT distinct medicine_name FROM medicines WHERE medicine_name LIKE :medicines';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['medicines' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a>' . $row['medicine_name'] . '</a>';
      }
    } else {
      echo '<a>No Record Found</a>';
    }
  }
?>