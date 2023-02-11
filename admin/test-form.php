<?php
include 'config.php';

if (isset($_POST['add_test'])) {
    $test_description = mysqli_real_escape_string($conn, $_POST['test_description']);
    $sample_type = mysqli_real_escape_string($conn, $_POST['sample_type']);
    $test_price = mysqli_real_escape_string($conn, $_POST['test_price']);
    $test_name = mysqli_real_escape_string($conn, $_POST['test_name']);
    $tube_type = mysqli_real_escape_string($conn, $_POST['tube_type']);
    $test_id = mysqli_real_escape_string($conn, $_POST['test_id']);
    $fasting = mysqli_real_escape_string($conn, $_POST['fasting']);

    $select = mysqli_query($conn, "SELECT * FROM `lab_tests` WHERE test_id = '$test_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Test already exist';
    } 
    else {
        $query = "INSERT INTO lab_tests (test_id, test_name, test_description, sample_type, fasting, tube_type, test_price) VALUES ('$test_id', '$test_name', '$test_description', '$sample_type', '$fasting', '$tube_type', '$test_price')" or die('query failed');
        $add_test = mysqli_query($conn, $query);

        if ($add_test) {
            $message[] = 'Test Added!';
            header('location:test-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:test-form.php');
        }
    }
}

if (isset($_POST['delete_test'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `lab_tests` WHERE test_id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM lab_tests WHERE test_id = '$delete_id' " or die('query failed');
        $delete_test = mysqli_query($conn, $query);

        if ($delete_test) {
            $message[] = 'Test Deleted!';
            header('location:test-form.php');
        } 
        else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:test-form.php');
        }
    } 
    else {
        echo "<script> alert('Test Not Exist'); </script>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Admin Lab Test</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!-- External CSS stylesheet -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
        include '../section/header.php';
    ?>

    <main>
        <!-- form -->
        <section>
            <div class="page-title">
                Form
            </div>
            <div class="form">
                <div class="content">
                    <div class="form-container">
                        <header>
                            Add A Test
                        </header>
                        <p>
                            Add Test Name, Id, Description and Other Details.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" name="test_name" placeholder=" Enter Test Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="test_id" placeholder=" Enter Test Id" required>
                                </div>

                                <div class="input-field">
                                    <label>Price</label>
                                    <input type="text" name="test_price" placeholder=" Enter Price" required>
                                </div>

                                <div class="input-field">
                                    <label>Sample Type</label>
                                    <input type="text" name="sample_type" placeholder=" Enter Sample Type" required>
                                </div>

                                <div class="input-field">
                                    <label>Fasting Requirements</label>
                                    <input type="text" name="fasting" placeholder=" Enter Fasting Requirements" required>
                                </div>

                                <div class="input-field">
                                    <label>Tube Type</label>
                                    <input type="text" name="tube_type" placeholder=" Enter Tube Type" required>
                                </div>

                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Description Of Test</label>
                                    <textarea type="text" name = "test_description" placeholder="About Test...." class="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="add_test" class="btn">
                                <span class="btnText">Add Test</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="content">
                    <div class="form-container">
                        <header>
                            Delete A Test
                        </header>
                        <p>
                            Enter Test Id
                        </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="delete_id" placeholder="Enter Test Id" required>
                                </div>
                            </div>

                            <button type="submit" class="btn" name="delete_test">
                                <span class="btnText">Delete Test</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Lab Test List -->
        <section>
            <div class="page-title">
                Test
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM lab_tests ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                            <img src="../Images/Lab test/ppbs.jpg" alt="">
                            <div class="content">
                                <p class="name"><span>Name</span> - <?= $row['test_name'] ?></p>
                                <p class="id"><span>Id</span> - <?= $row['test_id'] ?></p>
                                <p class="sample_type"><span>Sample Type</span> - <?= $row['sample_type'] ?></p>
                                <p class="fasting"><span>Fasting</span> - <?= $row['fasting'] ?></p>
                                <p class="test_price"><span>Test Price</span> - <?= $row['test_price'] ?></p>
                                <p class="tube_type"><span>Tube Type</span> - <?= $row['tube_type'] ?></p>
                            </div>
                        </button> 
                        <?php
                    }
                ?>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php
        include '../section/footer.php';
    ?>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>