<?php
include 'config.php';

if (isset($_POST['add_medicine'])) {
    $medicine_image = addslashes(file_get_contents($_FILES["medicine_image"]["tmp_name"]));
    $medicine_warning_pregnancy = mysqli_real_escape_string($conn, $_POST['medicine_warning_pregnancy']);
    $medicine_warning_alcohol = mysqli_real_escape_string($conn, $_POST['medicine_warning_alcohol']);
    $medicine_warning_allergy = mysqli_real_escape_string($conn, $_POST['medicine_warning_allergy']);
    $medicine_warning_kidney = mysqli_real_escape_string($conn, $_POST['medicine_warning_kidney']);
    $medicine_warning_liver = mysqli_real_escape_string($conn, $_POST['medicine_warning_liver']);
    $medicine_direction_use = mysqli_real_escape_string($conn, $_POST['medicine_direction_use']);
    $medicine_introduction = mysqli_real_escape_string($conn, $_POST['medicine_introduction']);
    $medicine_effects = mysqli_real_escape_string($conn, $_POST['medicine_effects']);
    $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
    $medicine_work = mysqli_real_escape_string($conn, $_POST['medicine_work']);
    $medicine_use = mysqli_real_escape_string($conn, $_POST['medicine_use']);
    $medicine_price = $_POST['medicine_price'];
    $medicine_id = $_POST['medicine_id'];
    $tablet_num = $_POST['tablet_num'];

    $image_size = $_FILES['medicine_image']['size'];
    if($image_size > 1000000){
        header('location:medicines-form.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM `medicines` WHERE medicine_id = '$medicine_id' ") or die('query failed');
    
    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Medicine already exist';
    } 
    else {
        $query = "INSERT INTO medicines (medicine_id, medicine_name, medicine_image, tablet_num, medicine_price, medicine_introduction, medicine_use, medicine_work, medicine_direction_use, medicine_effects, medicine_warning_pregnancy, medicine_warning_alcohol, medicine_warning_allergy, medicine_warning_kidney, medicine_warning_liver) VALUES ('$medicine_id', '$medicine_name', '$medicine_image', '$tablet_num', '$medicine_price', '$medicine_introduction', '$medicine_use', '$medicine_work', '$medicine_direction_use', '$medicine_effects', '$medicine_warning_pregnancy', '$medicine_warning_alcohol', '$medicine_warning_allergy', '$medicine_warning_kidney', '$medicine_warning_liver')" or die('query failed');
        $add_medicine = mysqli_query($conn, $query);

        if ($add_medicine) {
            $message[] = 'Medicine Added!';
            header('location:medicines-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:medicines-form.php');
        }
    }
}

if (isset($_POST['delete_medicine'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `medicines` WHERE medicine_id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM medicines WHERE medicine_id = '$delete_id' " or die('query failed');
        $del_medicine = mysqli_query($conn, $query);

        if ($del_medicine) {
            $message[] = 'Medicine Deleted!';
            header('location:medicines-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:medicines-form.php');
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
    <title>Swastik - Admin Medicines</title>
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
                            Add A Medicine
                        </header>
                        <p>
                            Add Medicine Id, Name, Number of Tablets, Price, and other details.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Choose A Medicine Image <br>(size less than 1mb)</label>
                                    <input type="file" name="medicine_image" placeholder="" required>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="medicine_id" placeholder=" Enter Medicine Id" required>
                                </div>

                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" name="medicine_name" placeholder=" Enter Medicine Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Number Of Tablet</label>
                                    <input type="text" name="tablet_num" placeholder="Enter Number of Tablets" required>
                                </div>

                                <div class="input-field">
                                    <label>Price</label>
                                    <input type="text" name="medicine_price" placeholder="Enter Price" required>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Introduction of Medicine</label>
                                    <textarea type="text" name = "medicine_introduction" placeholder="Medicine Introduction...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Use Of Medicine</label>
                                    <textarea type="text" name = "medicine_use" placeholder="Medicine Use...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>How Medicine Work</label>
                                    <textarea type="text" name = "medicine_work" placeholder="Medicine Work...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Direction Of Use</label>
                                    <textarea type="text" name = "medicine_direction_use" placeholder="Direction Of Use...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Effects Of Medicines</label>
                                    <textarea type="text" name = "medicine_effects" placeholder="Medicine Effects...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Pragnency Warning</label>
                                    <textarea type="text" name = "medicine_warning_pregnancy" placeholder="Medicine Warning Pragnency...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Alcohol Warning</label>
                                    <textarea type="text" name = "medicine_warning_alcohol" placeholder="Medicine Warning Alcohol...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Allergy Warning</label>
                                    <textarea type="text" name = "medicine_warning_allergy" placeholder="Medicine Warning Allergy...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Liver Warning</label>
                                    <textarea type="text" name = "medicine_warning_liver" placeholder="Medicine Warning Liver...." class="description"></textarea>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Kidney Warning</label>
                                    <textarea type="text" name = "medicine_warning_kidney" placeholder="Medicine Warning Kidney...." class="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="add_medicine" class="btn">
                                <span class="btnText">Add Medicine</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="content">
                    <div class="form-container">
                        <header>
                            Delete A Medicine
                        </header>
                        <p>
                            Enter Medicine Id
                        </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="delete_id" placeholder="Enter Doctor Id" required>
                                </div>
                            </div>

                            <button type="submit" class="btn" name="delete_medicine">
                                <span class="btnText">Delete Medicine</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Medicine List -->
        <section>
            <div class="page-title">
                Medicines
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM medicines ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                        <?php echo '<img src="data:medicine_image;base64,'.base64_encode($row['medicine_image']).'" alt = "Doctor" " >';?>
                            
                            <div class="content">
                                <p class="name"><span>Name</span> - <?= $row['medicine_name'] ?></p>
                                <p class="medicine-id"><span>Id</span> - <?= $row['medicine_id'] ?></p>
                                <p class="Price"><span>Price</span> - <?= $row['medicine_price'] ?></p>
                                <p class="tablet_num"><span>Number Of Tablets</span> - <?= $row['tablet_num'] ?></p>
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