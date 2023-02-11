<?php
include 'config.php';

if (isset($_POST['add_product'])) {
    $product_image = addslashes(file_get_contents($_FILES["product_image"]["tmp_name"]));
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_benefit_1 = mysqli_real_escape_string($conn, $_POST['product_benefit_1']);
    $product_benefit_2 = mysqli_real_escape_string($conn, $_POST['product_benefit_2']);
    $product_benefit_3 = mysqli_real_escape_string($conn, $_POST['product_benefit_3']);
    $product_benefit_4 = mysqli_real_escape_string($conn, $_POST['product_benefit_4']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $image_size = $_FILES['product_image']['size'];
    if($image_size > 1000000){
        header('location:healthcare-form.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM `healthcare_products` WHERE product_id = '$product_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Product already exist';
    } 
    else {
        $query = "INSERT INTO healthcare_products (product_id, product_category, product_image, product_name, product_price, product_description, product_benefit_1, product_benefit_2, product_benefit_3, product_benefit_4, product_brand, expiry_date) VALUES ('$product_id', '$product_category', '$product_image', '$product_name', '$product_price', '$product_description', '$product_benefit_1', '$product_benefit_2', '$product_benefit_3', '$product_benefit_4', '$product_brand', '$expiry_date')" or die('query failed');
        $add_product = mysqli_query($conn, $query);

        if ($add_product) {
            $message[] = 'Product Added!';
            header('location:healthcare-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:healthcare-form.php');
        }
    }
}

if (isset($_POST['delete_product'])) {
    $delete_id = $_POST['delete_id'];
    $del_select = mysqli_query($conn, "SELECT * FROM `healthcare_products` WHERE product_id = '$delete_id' ") or die('query failed');

    if (mysqli_num_rows($del_select) > 0) {
        $query = "DELETE FROM healthcare_products WHERE product_id = '$delete_id' " or die('query failed');
        $delete_surgery = mysqli_query($conn, $query);

        if ($delete_product) {
            $message[] = 'Product Deleted!';
            header('location:healthcare-form.php');
        } else {
            echo "<script> alert('failed to connect'); </script>";
            header('location:healthcare-form.php');
        }
    } else {
        echo "<script> alert('Product Not Exist'); </script>";
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
    <title>Swastik - Admin Healthcare Product</title>
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
                            Add A Product
                        </header>
                        <p>
                            Add Product image, Category, Name, Description, and other details.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="fields">

                                <div class="input-field">
                                    <label>Choose Image <br>(size less than 1mb)</label>
                                    <input type="file" name="product_image" placeholder="" required>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" name="product_name" placeholder=" Enter product Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="product_id" placeholder=" Enter product Id" required>
                                </div>

                                <div class="input-field">
                                    <label>Product Category</label>
                                    <input type="text" name="product_category" placeholder=" Enter product Category">
                                </div>

                                <div class="input-field">
                                    <label>Product Price</label>
                                    <input type="text" name="product_price" placeholder=" Enter product Price" required>
                                </div>

                                <div class="input-field">
                                    <label>Product Benefit 1</label>
                                    <input type="text" name="product_benefit_1" placeholder=" Enter product Benefit">
                                </div>

                                <div class="input-field">
                                    <label>Product Benefit 2</label>
                                    <input type="text" name="product_benefit_2" placeholder=" Enter product Benefit">
                                </div>

                                <div class="input-field">
                                    <label>Product Benefit 3</label>
                                    <input type="text" name="product_benefit_3" placeholder=" Enter product Benefit">
                                </div>

                                <div class="input-field">
                                    <label>Product Benefit 4</label>
                                    <input type="text" name="product_benefit_4" placeholder=" Enter product Benefit">
                                </div>

                                <div class="input-field">
                                    <label>Product Brand</label>
                                    <input type="text" name="product_brand" placeholder=" Enter product Brand" required>
                                </div>

                                <div class="input-field">
                                    <label>Expiry Date</label>
                                    <input type="text" name="expiry_date" placeholder=" Enter Expiry Date">
                                </div>

                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Description Of Product</label>
                                    <textarea type="text" name = "product_description" placeholder="About Product...." class="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="add_product" class="btn">
                                <span class="btnText">Add Product</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="content">
                    <div class="form-container">
                        <header>
                            Delete A Product
                        </header>
                        <p>
                            Enter Product Id
                        </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Id</label>
                                    <input type="text" name="delete_id" placeholder="Enter Product Id" required>
                                </div>
                            </div>

                            <button type="submit" class="btn" name="delete_product">
                                <span class="btnText">Delete Product</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Surgery List -->
        <section>
            <div class="page-title">
                Products
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM healthcare_products ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                        <?php echo '<img src="data:product_image;base64,'.base64_encode($row['product_image']).'" alt = "Product" " >';?>
                            
                            <div class="content">
                                <p class="name"><span>Name</span> - <?= $row['product_name'] ?></p>
                                <p class="surgery-id"><span>Id</span> - <?= $row['product_id'] ?></p>
                                <p class="post"><span>Price</span> - <?= $row['product_price'] ?></p>
                                <p class="post"><span>Category</span> - <?= $row['product_category'] ?></p>
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