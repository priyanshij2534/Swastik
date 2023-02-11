<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Swastik - HealthCare</title>
  <link rel="icon" href="../Images/icons/favicon.png">

  <!--External CSS style Sheets -->
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="healthcare.css">

  <!--NavBar CSS style Sheets -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
  <!-- header -->
  <?php
  include '../section/header.php';
  ?>

  <main>
    <!-- Banners -->
    <div class="banner">

      <div class="mySlides fade">
        <img src="../Images/healthcare/banner1.png" alt="banner">
      </div>

      <div class="mySlides fade">
        <img src="../Images/healthcare/banner2.png" alt="banner">
      </div>

      <div class="mySlides fade">
        <img src="../Images/healthcare/banner3.png" alt="banner">
      </div>

      <div class="mySlides fade">
        <img src="../Images/healthcare/banner4.png" alt="banner">
      </div>

      <a class="prev" onclick="plusSlides(-1)">
        < </a>
          <a class="next" onclick="plusSlides(1)"> > </a>

    </div>

    <!-- services we provide -->
    <section class="services">

      <div class="details">
        <div class="card-container no-scrollbar">

          <div class="card">
            <div class="services-image">
              <img src="../Images/healthcare/personal-care.jpg" alt="image">
            </div>
            <div class="content">
              <p>Personal Care</p>
            </div>
          </div>

          <div class="card">
            <div class="services-image">
              <img src="../Images/healthcare/sexual-wellness.jpg" alt="image">
            </div>
            <div class="content">
              <p>Sexual Wellness</p>
            </div>
          </div>

          <div class="card">
            <div class="services-image">
              <img src="../Images/healthcare/covid-care.jpg" alt="image">
            </div>
            <div class="content">
              <p>Covid Care</p>
            </div>
          </div>

          <div class="card">
            <div class="services-image">
              <img src="../Images/healthcare/fitness.jpeg" alt="">
            </div>
            <div class="content">
              <p>Fitness</p>
            </div>
          </div>

          <div class="card">
            <div class="services-image">
              <img src="../Images/healthcare/home-appliances.jpg" alt="image">
            </div>
            <div class="content">
              <p>Home Appliances</p>
            </div>
          </div>

        </div>
      </div>

    </section>

    <!-- Search medicine -->
    <section class="find-product" style="padding-top: 20px">
      <div class="imgBx">
        <div class="background"></div>
        <img src="../Images/healthcare/healthcare.jpg" alt="">
      </div>

      <div class="contentBx">
        <h1 class="title">Search For A Product</h1>

        <div class="search-container">
          <form action="details.php" method="post" class="search-bar">
            <input type="text" name="search" id="search" placeholder="Search Products" autocomplete="off">
            <button type="submit" name="submit" id="search">
              <img src="../Images/icons/search.png" alt=""></button>
          </form>
        </div>

        <div class="product-list">
          <div class="no-scrollbar" id="show-list"></div>
        </div>

        <div class="workflow">
          <h2 class="workflow-title">Here Is How It Works</span></h2>

          <div class="card-container no-scrollbar">
            <button class="card">
              <div class="content">
                <ul>
                  <li class="card-title">Find Products</li>
                  <li class="details">Find products as per your need</li>
                </ul>
              </div>
            </button>

            <button class="card">
              <div class="content">
                <ul>
                  <li class="card-title">Place Your Order</li>
                  <li class="details">Order the product and share the review</li>
                </ul>
              </div>
            </button>

            <button class="card">
              <div class="content">
                <ul>
                  <li class="card-title">Order Confirmed</li>
                  <li class="details">Products will be confirmed</li>
                </ul>
              </div>
            </button>

            <button class="card">
              <div class="content">
                <ul>
                  <li class="card-title">Delivery</li>
                  <li class="details">After confirming products will Be Delivered at your Home
                  </li>
                </ul>
              </div>
            </button>
          </div>

        </div>

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

<!--Fontawesome JavaScript -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!--External JavaScript -->
<script src="healthcare.js" charset="utf-8"></script>

</html>