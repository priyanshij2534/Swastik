<?php
include 'config.php';

if (isset($_POST['add_admin'])) {
    $admin_id = $_POST['admin_id'];

    $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$admin_id' ") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        if ($row = mysqli_fetch_assoc($select_user)) {
            $email = $row['email'];
            $name = $row['name'];
        }
    } else {
        echo "<script>alert ('User Not Registered');</script>";
        exit();
    }

    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User is already admin';
    } else {
        $query = "INSERT INTO admin (id, level, username, email) VALUES ('$admin_id', 1, '$name', '$email')" or die('query failed');
        $add_admin = mysqli_query($conn, $query);

        if ($add_admin) {
            $message[] = 'Admin Added!';
            header('location:admin-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:admin-form.php');
        }
    }
}

if (isset($_POST['delete_admin'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM admin WHERE id = '$delete_id' " or die('query failed');
        $del_admin = mysqli_query($conn, $query);

        if ($del_admin) {
            $message[] = 'Admin Deleted!';
            header('location:admin-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:admin-form.php');
        }
    } else {
        echo "<script> alert('Admin Not Exist'); </script>";
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
    <title>Swastik - Admin</title>
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

    <!-- Form -->
    <section>
        <div class="page-title">
            Form
        </div>
        <div class="form">
            <div class="content">
                <div class="form-container">
                    <header>
                        Add An Admin
                    </header>
                    <p>
                        Enter Admin Id.
                    </p>

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="fields">
                            <div class="input-field">
                                <label>Id</label>
                                <input type="text" name="admin_id" placeholder=" Enter Id" required>
                            </div>
                        </div>

                        <button type="submit" name="add_admin" class="btn">
                            <span class="btnText">Add Admin</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="content">
                <div class="form-container">
                    <header>
                        Delete An Admin
                    </header>
                    <p>
                        Enter Admin Id
                    </p>

                    <form action="#" method="post">
                        <div class="fields">
                            <div class="input-field">
                                <label>Id</label>
                                <input type="text" name="delete_id" placeholder="Enter Doctor Id" required>
                            </div>
                        </div>

                        <button type="submit" class="btn" name="delete_admin">
                            <span class="btnText">Delete admin</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Admin List -->
    <section>
        <div class="page-title">
            Admins
        </div>
        <div class="list">
            <?php
            require_once 'config.php';

            $sql = " SELECT * FROM admin ";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <button class="card">
                    <img src="../Images/admin/admin.jpg" alt="">
                    <div class="content">
                        <p class="name"><span>Name</span> - <?= $row['username'] ?></p>
                        <p class="id"><span>Id</span> - <?= $row['id'] ?></p>
                        <p class="email"><span>Email</span> - <?= $row['email'] ?></p>
                    </div>
                </button>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
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