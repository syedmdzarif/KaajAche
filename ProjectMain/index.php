<?php 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    
   

 	<title>KaajAche</title>
 </head>
 <body>
   <header id="main-header">
      <div class="container">
         <h1>KaajAche</h1>
      </div>
   </header>


 	<nav id="navbar">
 		<div class="container">
 		 <ul>
 		 	<a class="w_login" href="worker_login.php">Login as Worker</a>
         <a class="e_login" href="emp_login.php">Login as Employer</a>
         <a class="w_signup" href="worker_signup.php">Signup as Worker</a>
         <a class="e_signup" href="emp_signup.php">Signup as Employer</a>
 		 </ul>
 		</div>
 	</nav>


   <!-- <div class="container2">
      // Slider main container//
      <div class="swiper">
         // Additional required wrapper //
         <div class="swiper-wrapper">
            // Slides //
            <div class="swiper-slide"><img src="image/slide1.jpg"></div>
            <div class="swiper-slide"><img src="image/carpenter.jpg"></div>
            <div class="swiper-slide"><img src="image/cook.jpg"></div>
            <div class="swiper-slide"><img src="image/delivery.jpg"></div>
            <div class="swiper-slide"><img src="image/driver.jpg"></div>
            <div class="swiper-slide"><img src="image/gardener.jpg"></div>
            <div class="swiper-slide"><img src="image/slide7.jpg"></div>
         </div>
         // If we need pagination //
         <div class="swiper-pagination"></div>
   
         // If we need navigation buttons //
         <div class="swiper-button-prev"></div>
         <div class="swiper-button-next"></div>
   
      </div>
   </div> -->
   
   <!-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script>
      const swiper = new Swiper('.swiper', {
         autoplay: {
            delay: 3000,
            disableOnInteraction: false,
         },
         // Optional parameters
         loop: true,
   
         // If we need pagination
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
   
         // Navigation arrows
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },

      });
   </script> -->

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/chef.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/driver.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/gardener.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/delivery.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/slide5.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


          <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

   <hr class="hr-line2">
   <hr class="hr-line2">

   <div class="workerinfo-header">
      <h1>How to start working?</h1>
      <div class="workerinfo">
         <h3>Find jobs that go hand in hand with your skill set with minimum experience. Apply for jobs from job lists and get paid according to your bidding. To ensure a satisfactory work experience, you can apply for jobs posted by seeing the rating of the employers.</h3>
         <img src="image/delivery.svg"  align="right"/>
      </div>
   </div>

   <hr class="hr-line2">
   <hr class="hr-line2">

   <div class="employerinfo-header">
      <h1>How to get a job done?</h1>
      <div class="employerinfo">
         <h3>Create a post with details of the job you want to get done. Choose the worker that fits your criterias well. No long-term committment, hence pocket friendly.</h3>
         <img src="image/employer.svg" style="float: left;"/>
      </div>
   </div>

   <hr class="hr-line2">
   <hr class="hr-line2">

   <br>
   <br>

   <div class="panels">
      <h1>Categories</h1>
      <div class="segment">
         <ul class="categories-list">
               <li><h3>Babysitter</h3></li>
               <li><h3>Barber</h3></li>
               <li><h3>Beautician</h3></li>
               <li><h3>Caregiver</h3></li>
               <li><h3>Carpenter</h3></li>
               <li><h3>Cook</h3></li>
               <li><h3>Decorator</h3></li>
               <li><h3>Delivery Man</h3></li>
         </ul>
      </div>

      <div class="segment">
         <ul class="categories-list">
            <li><h3>Driver</h3></li>
            <li><h3>Electrician</h3></li>
            <li><h3>Event Planner</h3></li>
            <li><h3>Gardener</h3></li>
            <li><h3>Housekeeper</h3></li>
            <li><h3>Mason</h3></li>
            <li><h3>Mechanic</h3></li>
            <li><h3>Pet Sitter</h3></li>
         </ul>
      </div>

      <div class="segment">
         <ul class="categories-list">
            <li><h3>Photographer</h3></li>
            <li><h3>Sweeper</h3></li>
            <li><h3>Tailor</h3></li>
            <li><h3>Technician</h3></li>
            <li><h3>Tour Guide</h3></li>
            <li><h3>Translator</h3></li>
            <li><h3>Tutor</h3></li>
            <li><h3>Videographer</h3></li>
         </ul>
      </div>

   </div>

   <div style="margin-top:70px;"></div>

 <footer class="footer">
      <div class="footer-left">
         <img src="image/KaajAche.jpg">
         <br>
         <br>
         <div class="socials">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
         </div>
      </div>
      <ul class="footer-right">
         <li>
            <h2>About Us</h2>
            <ul class="box">
               <li><a class="aboutUs" href="aboutUs.php">About Us</a></li>
               <li><a href="#">How It Works</a></li>
               <li><a class="modsignup" href="m_signup.php">Apply As Moderator</a></li>
               <li><a class="modsignup" href="m_login.php">Login As Moderator</a></li>
            </ul>
         </li>

         <li>
            <h2>Terms</h2>
            <ul class="box">
               <li><a class="privacy"
                  href="privacy.php">Privacy Policy</a></li>
               <li><a class="tc"
                  href="terms.php">Terms and Conditions</a></li>
            </ul>
         </li>

         <li>
            <h2>Help and Support</h2>
            <ul class="box">
               <li><a class="contact"
                  href="contact.php">Contact</a></li>
               <li><a class="address" href="address.php">Address</a></li>
            </ul>
         </li>
      </ul>
      <div class="footer-bottom">
         <p>Copyright &copy; 2022 KaajAche</p>
      </div>
   </footer>

 </body>
 </html>