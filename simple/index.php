
<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
  }
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

?>


    <?php include("./includes/header.php"); ?>

    <section class="container top-main">
      <div class="slideshow-container">
        <div class="slider fade">
          <img src=".//assets/images/s1.jpg" class="img-slider">
        </div>
        
        <div class="slider fade">
          <img src=".//assets/images/s2.jpg" class="img-slider">
        </div>
        
        <div class="slider fade">
          <img src=".//assets/images/s3.jpg" class="img-slider">
        </div>

        <div class="slider fade">
          <img src=".//assets/images/s4.jpg" class="img-slider">
        </div>

        <div class="slider fade">
          <img src=".//assets/images/s5.jpg" class="img-slider">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>

        <div class="dotss">
        <div class="dots">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          <span class="dot" onclick="currentSlide(4)"></span> 
          <span class="dot" onclick="currentSlide(5)"></span> 
          <span class="dot" onclick="currentSlide(6)"></span> 
        </div>
        </div>
    </section>

    <section class="main container">

      <aside class="recent-post ">

        <div class="recent-title">
            <i class="fas fa-chevron-circle-right"></i>
          <h2>
            recent posts<span><br />Lorem Ipsum is not simply</span>
          </h2>
        </div>

        <div class="recent-posts">
          <h5>Maecenas vitae</h5>
          <p>
            There are many variations of passages of Lorem Ipsum available, but
            the majority have suffered alteration in some form, by injected
            humour
          </p>
          <span>15/08/2019</span>
        </div>
        <div class="recent-posts">
          <h5>Maecenas vitae</h5>
          <p>
            There are many variations of passages of Lorem Ipsum available, but
            the majority have suffered alteration in some form, by injected
            humour
          </p>
          <span>15/08/2019</span>
        </div>
        <div class="recent-posts">
          <h5>Maecenas vitae</h5>
          <p>
            There are many variations of passages of Lorem Ipsum available, but
            the majority have suffered alteration in some form, by injected
            humour
          </p>
          <span>15/08/2019</span>
        </div>
        <div class="more-posts">
          <button class="btn btn-posts"><i class="fas fa-angle-right"></i> More Posts</button>
        </div>
      </aside>

      <article class="feature-post ">
        <div class="feature-title">
            <i class="fas fa-chevron-circle-right"></i>
          <h2>
            Feature posts<span><br />Lorem Ipsum is not simply</span>
          </h2>
        </div>
        <div class="posts">

            <div class="post ">
                  <img src=".//assets/images/1.jpg" alt="post-1" />
                  <div class="post-text" >
                    <h3>Lorem Ipsum available </h3>
                    <p>11/09/1019</p>
                  </div>
                </div>

            <div class="post ">
              <img src=".//assets/images/1.jpg" alt="post-1" />
              <div class="post-text">
                <h3>Lorem Ipsum available </h3>
                <p>11/09/1019</p>
              </div>
            </div>

            <div class="post ">
                <img src=".//assets/images/1.jpg" alt="post-1" />
                <div class="post-text">
                  <h3>Lorem Ipsum available </h3>
                  <p>11/09/1019</p>
                </div>
              </div>

              <div class="post">
                  <img src=".//assets/images/1.jpg" alt="post-1" />
                  <div class="post-text">
                    <h3>Lorem Ipsum available </h3>
                    <p>11/09/1019</p>
                  </div>
                </div>
          </div>
      </article>

    </section>
    
    <script src="./assets/js/slider.js" ></script>
    <?php include("./includes/footer.php");?>

  