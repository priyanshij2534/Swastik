<?php
include 'config.php';

if (isset($_POST['add_doctor'])) {
    $profile_picture = addslashes(file_get_contents($_FILES["profile_picture"]["tmp_name"]));
    $specialization = $_POST['specialization'];
    $doctor_name = $_POST['doctor_name'];
    $doctors_id = $_POST['doctors_id'];
    $post = $_POST['post'];

    $image_size = $_FILES['profile_picture']['size'];
    if($image_size > 1000000){
        header('location:doctor-form.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM `doctors` WHERE doctors_id = '$doctors_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Doctor already exist';
    } 
    else {
        $query = "INSERT INTO doctors (doctors_id, doctor_profile, doctor_name, doctor_post, doctor_work) VALUES ('$doctors_id', '$profile_picture', '$doctor_name', '$post', '$specialization')" or die('query failed');
        $add_doctor = mysqli_query($conn, $query);

        if ($add_doctor) {
            $message[] = 'Doctor Added!';
            header('location:doctor-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:doctor-form.php');
        }
    }
}

if (isset($_POST['delete_doctor'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `doctors` WHERE doctors_id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM doctors WHERE doctors_id = '$delete_id' " or die('query failed');
        $del_doctor = mysqli_query($conn, $query);

        if ($del_doctor) {
            $message[] = 'Doctor Deleted!';
            header('location:doctor-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:doctor-form.php');
        }
    } else {
        echo "<script> alert('Doctor Not Exist'); </script>";
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
    <title>Swastik - Admin Doctors</title>
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
                            Add A Doctor
                        </header>
                        <p>
                            Add Doctors Profile Image, Name, Specialization, Position.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="fields">

                                <div class="input-field">
                                    <label>Choose A Profile Picture <br>(size less than 1mb)</label>
                                    <input type="file" name="profile_picture" placeholder="" required>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" name="doctor_name" placeholder=" Enter Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="doctors_id" placeholder=" Enter Id" required>
                                </div>

                                <div class="input-field">
                                    <label>Post</label>
                                    <input type="text" name="post" placeholder="Enter Post" required>
                                </div>

                                <div class="input-field">
                                    <label>Specialization</label>
                                    <input type="text" name="specialization" placeholder="Enter Specialization" required>
                                </div>
                            </div>

                            <button type="submit" name="add_doctor" class="btn">
                                <span class="btnText">Add Doctor</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="content">
                    <div class="form-container">
                        <header>
                            Delete A Doctor
                        </header>
                        <p>
                            Enter Doctor Id
                        </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="delete_id" placeholder="Enter Doctor Id" required>
                                </div>
                            </div>

                            <button type="submit" class="btn" name="delete_doctor">
                                <span class="btnText">Delete Doctor</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Doctor List -->
        <section>
            <div class="page-title">
                Doctors
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM doctors ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                        <?php echo '<img src="data:doctor_profile;base64,'.base64_encode($row['doctor_profile']).'" alt = "Doctor" " >';?>
                            
                            <div class="content">
                                <p class="name"><span>Name</span> - <?= $row['doctor_name'] ?></p>
                                <p class="doctor-id"><span>Id</span> - <?= $row['doctors_id'] ?></p>
                                <p class="post"><span>Post</span> - <?= $row['doctor_post'] ?></p>
                                <p class="work"><span>Specialization</span> - <?= $row['doctor_work'] ?></p>
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