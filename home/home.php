<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Swastik - A true devotion to healing</title>
  <link rel="icon" href="../Images/icons/favicon.png">

  <!--External CSS style Sheets -->
  <link rel="stylesheet" href="home.css">
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
    <!-- Banners SlideShow -->
    <section class="banner">

      <div class="mySlides fade">
        <img src="../Images/home/banner2_for_home.png" alt="banner">
      </div>

      <div class="mySlides fade">
        <img src="../Images/home/banner1_for_home.jpg" alt="banner">
      </div>

      <div class="mySlides fade">
        <img src="../Images/home/banner3_for_home.jpg" alt="banner">
      </div>

      <a class="prev" onclick="plusSlides(-1)"> < </a>
      <a class="next" onclick="plusSlides(1)"> > </a>

    </section>

    <!-- services we provide -->
    <section class="services">
      <h2 class="title">Services We Provide</h2>

      <div class="details">
        <div class="card-container no-scrollbar">
          <div class="card">
            <a href="../medicines/medicines.php">
              <div class="services-image">
                <img src="../Images/home/medicine.jpeg" alt="">
              </div>
              <div class="content">
                <p>Medicines</p>
              </div>
            </a>
          </div>

          <div class="card">
            <a href="../Lab test/lab-test.php">
              <div class="services-image">
                <img src="../Images/home/labTest.jpeg" alt="">
              </div>
              <div class="content">
                <p>Lab Test</p>
              </div>
            </a>
          </div>

          <div class="card">
            <a href="../healthcare/healthcare.php">
              <div class="services-image">
                <img src="../Images/home/health-care.jpeg" alt="">
              </div>
              <div class="content">
                <p>Health Care</p>
              </div>
            </a>
          </div>

          <div class="card">
            <a href="../Blogs/blogs.php">
              <div class="services-image">
                <img src="../Images/home/blogs.jpeg" alt="">
              </div>
              <div class="content">
                <p>Blogs</p>
              </div>
            </a>
          </div>

          <div class="card">
            <a href="../Gym/gym.php">
              <div class="services-image">
                <img src="../Images/home/gym.jpeg" alt="">
              </div>
              <div class="content">
                <p>Gym</p>
              </div>
            </a>
          </div>

          <div class="card">
            <a href="../surgery/surgery.php">
              <div class="services-image">
                <img src="../Images/home/surgery.jpeg" alt="">
              </div>
              <div class="content">
                <p>Surgery</p>
              </div>
            </a>
          </div>

        </div>
      </div>

    </section>

    <!-- doctors -->
    <section class="doctors">
      <h2 class="title">Meet our <span>Medical Specialists</span></h2>

      <div class="details">
        <div class="card-container no-scrollbar">

          <?php
          require_once 'config.php';

          $sql = " SELECT * FROM doctors ";
          $result = mysqli_query($conn, $sql);
          $num_rows = mysqli_num_rows($result);

          $i = 0;

          while ($i < 6) {
            $row = mysqli_fetch_assoc($result);
          ?>
            <div class="card">
              <div class="doctor-profile">
                <?php echo '<img src="data:doctor_profile;base64,' . base64_encode($row['doctor_profile']) . '" alt = "Doctor" " >'; ?>
              </div>
              <div class="content">
                <ul>
                  <li class="name"><?= $row['doctor_name'] ?></li>
                  <li class="post"><?= $row['doctor_post'] ?></li>
                  <li class="work"><?= $row['doctor_work'] ?></li>
                </ul>
              </div>
            </div>
          <?php
            $i++;
          }
          ?>

        </div>
      </div>

      <div class="doctor-button">
        <a href="../pages/all-doctors.php">
          <button class="view-all" role="button">View All Doctors</button>
        </a>
      </div>
    </section>

    <!-- Surgeries -->
    <section class="surgeries">
      <h1 class="title">Surgeries We Cover</h1>

      <div class="container">
        <?php
        require_once 'config.php';

        $sql = " SELECT * FROM surgery ";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        $i = 0;

        while ($i < 3) {
          $row = mysqli_fetch_assoc($result)
        ?>
          <button class="surgery-details">
            <?php echo '<img src="data:surgery_image;base64,' . base64_encode($row['surgery_image']) . '" alt = "Surgery" class="surgery-image" " >'; ?>

            <div class="details">
              <h2><span><?= $row['surgery_name'] ?></h2>
              <p><?= $row['surgery_description'] ?></p>
            </div>
          </button>
        <?php
          $i++;
        }
        ?>
      </div>

      <div class="surgery-button">
        <a href="../pages/all-surgery.php">
          <button class="view-all" role="button">View All Surgery</button>
        </a>
      </div>
    </section>

    <!-- lab tests -->
    <section class="lab-tests">
      <h2 class="title">Lab Tests</h2>

      <div class="details">
        <div class="card-container no-scrollbar">

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-covid.jpg" alt="">
            </div>
            <div class="content">
              <p>COVID - 19</p>
            </div>
          </div>

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-diabetes.jpg" alt="">
            </div>
            <div class="content">
              <p>Diabetes</p>
            </div>
          </div>

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-metabolic.jpg" alt="">
            </div>
            <div class="content">
              <p>Metabolism</p>
            </div>
          </div>

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-cholestrol.jpg" alt="">
            </div>
            <div class="content">
              <p>Cholestreol</p>
            </div>
          </div>

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-Progesterone.jpg" alt="">
            </div>
            <div class="content">
              <p>Progesterone</p>
            </div>
          </div>

          <div class="card">
            <div class="Test-image">
              <img src="../Images/home/test-thyroid.jpg" alt="">
            </div>
            <div class="content">
              <p>Thyroid</p>
            </div>
          </div>

        </div>
      </div>

      <div class="test-button">
        <a href="../pages/all-test.php">
          <button class="view-all" role="button">View All Tests</button>
        </a>
      </div>

    </section>
  </main>

  <footer class="home-footer">
    <div class="home-footer-addr">
      <h1 class="home-footer-logo">Swastik</h1>

      <h2>Contact</h2>

      <address>
        VIT Bhopal<br>

        <a class="home-footer-btn" href="mailto:help.swastik.web@gmail.com">Email Us</a>
      </address>
    </div>

    <ul class="home-footer-nav">
      <li class="nav-item nav-item-extra">
        <h2 class="nav-title">Our services</h2>

        <ul class="nav-ul  nav-ul-extra">
          <li>
            <a href="../medicines/medicines.php">Order Medicine</a>
          </li>

          <li>
            <a href="../healthcare/healthcare.php">Daily-Products</a>
          </li>

          <li>
            <a href="../Lab Test/lab-test.php">Lab Tests</a>
          </li>

          <li>
            <a href="../surgery/surgery.php">Surgeries</a>
          </li>

          <li>
            <a href="../Gym/gym.php">Gym</a>
          </li>

          <li>
            <a href="../Blogs/blogs.php">Blogs</a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <h2 class="nav-title">About our website</h2>

        <ul class="nav-ul">
          <li>
            <a href="#"></a>
          </li>

          <li>
            <a href="../pages/about-us.php">About us</a>
          </li>

          <li>
            <a href="../pages/swastik-hospital.php">Swastik Hospital</a>
          </li>

      </li>
    </ul>
    </li>

    <li class="nav-item">
      <h2 class="nav-title">Legal</h2>

      <ul class="nav-ul">
        <li>
          <a href="#">Privacy Policy</a>
        </li>

        <li>
          <a href="#">Terms of Use</a>
        </li>
      </ul>
    </li>
    </ul>

    <div class="links">
      <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook fa-xl media-links;"></i></a>
      <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter fa-xl media-links"></i></a>
      <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-xl media-links"></i></a>
      <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in fa-xl media-links"></i></i></a>

      <div class="legal-links">
        <span>&copy; 2022 Swastik. All rights reserved.</span>
      </div>
    </div>
  </footer>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!--Fontawesome JavaScript -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!--External JavaScript -->
<script src="home.js" charset="utf-8"></script>

</html>