<?php
include 'config.php';

if (isset($_POST['add_surgery'])) {
    $surgery_image = addslashes(file_get_contents($_FILES["surgery_image"]["tmp_name"]));
    $surgery_name = $_POST['surgery_name'];
    $surgery_id = $_POST['surgery_id'];
    $surgery_description = $_POST['description'];

    $image_size = $_FILES['surgery_image']['size'];
    if($image_size > 1000000){
        header('location:surgeries-form.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM `surgery` WHERE surgery_id = '$surgery_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Surgery already exist';
    } 
    else {
        $query = "INSERT INTO surgery (surgery_id, surgery_name, surgery_description, surgery_image) VALUES ('$surgery_id', '$surgery_name', '$surgery_description', '$surgery_image')" or die('query failed');
        $add_surgery = mysqli_query($conn, $query);

        if ($add_surgery) {
            $message[] = 'Surgery Added!';
            header('location:surgeries-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:surgeries-form.php');
        }
    }
}

if (isset($_POST['delete_surgery'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `surgery` WHERE surgery_id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM surgery WHERE surgery_id = '$delete_id' " or die('query failed');
        $delete_surgery = mysqli_query($conn, $query);

        if ($delete_surgery) {
            $message[] = 'Surgery Deleted!';
            header('location:surgeries-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:surgeries-form.php');
        }
    } else {
        echo "<script> alert('Surgery Not Exist'); </script>";
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
    <title>Swastik - Admin Surgery</title>
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
                            Add A Surgery
                        </header>
                        <p>
                            Add Surgery Image, Name, Description.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="fields">

                                <div class="input-field">
                                    <label>Choose Image <br>(size less than 1mb)</label>
                                    <input type="file" name="surgery_image" placeholder="" required>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" name="surgery_name" placeholder=" Enter surgery Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="surgery_id" placeholder=" Enter surgery Id" required>
                                </div>

                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Description Of Surgery</label>
                                    <textarea type="text" name = "description" placeholder="About Surgery...." class="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="add_surgery" class="btn">
                                <span class="btnText">Add Surgery</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="content">
                    <div class="form-container">
                        <header>
                            Delete A Surgery
                        </header>
                        <p>
                            Enter Surgery Id
                        </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="delete_id" placeholder="Enter Surgery Id" required>
                                </div>
                            </div>

                            <button type="submit" class="btn" name="delete_surgery">
                                <span class="btnText">Delete Surgery</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Surgery List -->
        <section>
            <div class="page-title">
                Surgeries
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM surgery ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                        <?php echo '<img src="data:surgery_image;base64,'.base64_encode($row['surgery_image']).'" alt = "Surgery" " >';?>
                            
                            <div class="content">
                                <p class="name"><span>Name</span> - <?= $row['surgery_name'] ?></p>
                                <p class="surgery-id"><span>Id</span> - <?= $row['surgery_id'] ?></p>
                                <p class="description"><span>Description</span> - <?= $row['surgery_description'] ?></p>
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