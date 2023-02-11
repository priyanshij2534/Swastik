<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- Title -->
  <title>Blogs - Swastik </title>
  <link rel="icon" href="../Images/icons/favicon.png">

  <!--External CSS style Sheets -->
  <link rel="stylesheet" href="blogs.css">
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
    <!-- Top-Slider -->
    <section>
      <div class="slideshow-container">
        <div class="mySlides fade">
          <a
            href="https://indianexpress.com/article/lifestyle/health/four-ingredient-detox-drink-skin-health-hair-care-8076881/"><img
              class="blog-top-slider-img" src="../Images/blogs/detox drink.jpg" alt="Detox Drink"></a>
          <div class="text">Check out this four-ingredient detox drink for skin health, hair care</div>
        </div>
        <div class="mySlides fade">
          <a
            href="https://healthnews.com/longevity/longevity-supplements/should-you-quit-taking-longevity-supplements-during-pregnancy/"><img
              class="blog-top-slider-img" src="../Images/blogs/Supplements During Pregnancy.jpg"
              alt="Supplements During Pregnancy"></a>
          <div class="text">Should You Quit Taking Longevity Supplements During Pregnancy?</div>
        </div>
        <div class="mySlides fade">
          <a
            href="https://www.healthline.com/health-news/blood-cancers-a-look-at-the-latest-treatments-and-their-promise"><img
              class="blog-top-slider-img" src="../Images/blogs/Blood Cancers.jpg" alt="Blood Cancers"></a>
          <div class="text">Blood Cancers: A Look at the Latest Treatments and Their Promise</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </section>

    <!-- Fitness & Exercise -->
    <section>
      <h2 class="Fitness-Exercise-heading">Fitness & Exercise</h2>
      <div class="Fitness-Exercise-main">
        <div class="Fitness-Exercise-left">
          <div class="Fitness-Exercise-img1">
            <a
              href="https://www.tonal.com/blog/the-ultimate-tonal-workout-guide-get-lean-build-muscle-and-improve-fitness/">
              <img src="../Images/blogs/BEST AND WORST WORKOUT.jpg" alt="BEST AND WORST WORKOUT">
            </a>
          </div>
          <a class="Fitness-Exercise-links"
            href="https://www.tonal.com/blog/the-ultimate-tonal-workout-guide-get-lean-build-muscle-and-improve-fitness/"><b>Tonal
              Program Finder Tool</b> - Improve Fitness, Get Lean, Build Muscle, Sport and Performance Training</a>
        </div>

        <div class="Fitness-Exercise-right">
          <div class="Fitness-Exercise-img2">
            <a href="https://www.webmd.com/fitness-exercise/ss/slideshow-fitness-mistakes">
              <img src="../Images/blogs/Fitness Mistakes.jpg" alt="Stop Making These Fitness Mistakes">
            </a>
          </div>
          <a class="Fitness-Exercise-links"
            href="https://www.webmd.com/fitness-exercise/ss/slideshow-fitness-mistakes"><b>Stop Making These Fitness
              Mistakes</b></a>

          <div class="Fitness-Exercise-img3">
            <a href="https://www.webmd.com/fitness-exercise/ss/slideshow-off-balance-core-moves">
              <img src="../Images/blogs/More Toned Stomach.jpg" alt="Off-Balance Core Moves for a More Toned Stomach">
            </a>
          </div>
          <a class="Fitness-Exercise-links"
            href="https://www.webmd.com/fitness-exercise/ss/slideshow-off-balance-core-moves"><b>Off-Balance Core Moves
              for a More Toned Stomach</b></a>
        </div>
      </div>
    </section>

    <!-- Home Remedies -->
    <section>
      <h2 class="Home-Remedies-heading">Home Remedies</h2>
      <div class="Home-Remedies-cards">
        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links"
            href="https://www.stylecraze.com/articles/simple-ways-to-remove-dark-circles-completely/">
            <img src="../Images/blogs/dark circles.jpg" alt="Reduce Dark Circles">
            <p>13 Natural Ways To Treat Dark Circles Under The Eyes At Home</p>
          </a>
        </div>

        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links"
            href="https://www.healthline.com/health/beauty-skin-care/home-remedies-for-glowing-skin">
            <img src="../Images/blogs/glowing skin.jpg" alt="GLOWING SKIN">
            <p>10 Home Remedies for Glowing Skin</p>
          </a>
        </div>

        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links" href="https://pgshop.in/blog/7-home-remedies-to-get-straight-hair-naturally/">
            <img src="../Images/blogs/STRAIGHT & SMOOTH HAIR.jpg" alt="STRAIGHT & SMOOTH HAIR">
            <p>7 Home Remedies to Get Straight Hair Naturally.</p>
          </a>
        </div>

        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links"
            href="https://www.houstonmethodist.org/blog/articles/2021/dec/home-remedies-for-heartburn-10-ways-to-get-rid-of-acid-reflux/">
            <img src="../Images/blogs/ACIDITY.jpg" alt="Acidity">
            <p>Home Remedies for Heartburn: 10 Ways to Get Rid of Acid Reflux</p>
          </a>
        </div>

        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links" href="https://www.healthline.com/nutrition/13-acne-remedies#zinc">
            <img src="../Images/blogs/PIMPLES.jpeg" alt="Get rid of pimples">
            <p>How to Get Rid of Acne: 14 Home Remedies for Pimples</p>
          </a>
        </div>

        <div class="Home-Remedies-card">
          <a class="Home-Remedies-links" href="https://www.healthline.com/nutrition/headache-remedies#headache-causes">
            <img src="../Images/blogs/Headache.jpg" alt="Get rid of headache">
            <p>18 Remedies to Get Rid of Headaches Naturally</p>
          </a>
        </div>
      </div>
    </section>
    
    <!-- Diseases -->
    <section>
      <h2 class="Diseases-heading">Diseases</h2>
      <div class="Diseases-main">
        <div class="Diseases-left">
          <div class="Diseases-img1">
            <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
              <img src="../Images/blogs/covid.jpeg" alt="COVID Prevention">
            </a>
          </div>
          <a class="Diseases-links" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public"><b>Advice for the public: Coronavirus disease (COVID-19)</b></a>

          <div class="Diseases-img2">
            <a href="https://www.mayoclinic.org/healthy-lifestyle/adult-health/in-depth/cancer-prevention/art-20044816">
              <img src="../Images/blogs/cancer.jpg" alt="Cancer Prevention">
            </a>
          </div>
          <a class="Diseases-links" href="https://www.mayoclinic.org/healthy-lifestyle/adult-health/in-depth/cancer-prevention/art-20044816"><b>Cancer prevention: 7 tips to reduce your risk</b></a>  
        </div>

        <div class="Diseases-mid">
          <div class="Diseases-img3">
            <a href="https://www.mayoclinic.org/diseases-conditions/type-2-diabetes/in-depth/diabetes-prevention/art-20047639">
              <img src="../Images/blogs/diabetes.jpg" alt="Diabetes Prevention">
            </a>
          </div>
          <a class="Diseases-links" href="https://www.mayoclinic.org/diseases-conditions/type-2-diabetes/in-depth/diabetes-prevention/art-20047639"><b>Diabetes prevention: 5 tips for taking control</b></a>

          <div class="Diseases-img4">
            <a href="https://pharmeasy.in/blog/5-ways-to-avoid-dengue-fever/">
              <img src="../Images/blogs/dengue.jpeg" alt="Dengue Prevention">
            </a>
          </div>
          <a class="Diseases-links" href="https://pharmeasy.in/blog/5-ways-to-avoid-dengue-fever/"><b>8 Preventive Measures For Dengue</b></a>  
        </div>

        <div class="Diseases-right">
          <div class="Diseases-img5">
            <a
              href="https://www.webmd.com/asthma/guide/asthma-prevention">
              <img src="../Images/blogs/asthma.jpg" alt="Asthma Prevention">
            </a>
          </div>
          <a class="Diseases-links" href="https://www.webmd.com/asthma/guide/asthma-prevention"><b>Preventing Asthma Attacks</b> - Causes , Tips and Treatment</a>
        </div>
      </div>
    </section>

    <br><br>
  </main>

  <!-- footer -->
  <?php
    include '../section/footer.php';
  ?>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!--FontAwesome JavaScript -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!--External JavaScript -->
<script src="blogs.js" charset="utf-8"></script>

</html>
