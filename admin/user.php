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

    <!-- Admin List -->
    <section>
        <div class="page-title">
            Users
        </div>
        <div class="list">
            <?php
            require_once 'config.php';

            $sql = " SELECT * FROM user_form ";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <button class="card">
                    <img src="../Images/admin/user.jpg" alt="">
                    <div class="content">
                        <p class="name"><span>Name</span> - <?= $row['name'] ?></p>
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