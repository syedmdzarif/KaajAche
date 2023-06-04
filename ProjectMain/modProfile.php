
<?php

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}



$sql1 = 'SELECT * FROM worker';
$sql2 = 'SELECT * FROM employer';
$sql3 = 'SELECT * FROM job';


$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);

$workers = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$employers = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$jobs = mysqli_fetch_all($result3, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="modProfile.css">


 	<title>KaajAche</title>
 	<link rel="stylesheet" type="text/css" href="modProfile.css">
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
 		 	<li><a href="modProfile.php">Profile</a></li>
 		 	<li><a href="#">Contact</a></li>
            <li><a href="editProfileM.php">Edit Profile</a></li>
         <li><a href="jobHistoryMod.php">Job History</a></li>
 		 	<a class="logout" href="m_logout.php">Log Out</a>
 		 </ul>
 		</div>
 	</nav>



   <div class = "box-2">
         <h1>Jamil Ahmed</h1>

         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>

      <div class = "box-3">
            <img src="modProfile1.png" width:"600px" height:"600px">
      </div>

      <hr class="hr-line2">
      <hr class="hr-line2">

      
      <div class="panels">


            <!-- WORKERS -->

         <div class = "segment">
            <h2>Workers</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search workers with name, NID, email, address..." name="search1" required value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search1">Search </button>
         </div>

         </form>


      


         <?php 

       if(isset($_GET['search1'])){
          $values = $_GET['search1'];
       $query = "SELECT full_name, nid, ratings, phone, dob, address, email FROM worker WHERE full_name LIKE '%$values%' OR nid LIKE '%$values%' OR ratings LIKE '%$values%' OR address LIKE '%$values%' OR email LIKE '%$values%' OR phone LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){
          
         foreach($query_run as $worker){
   ?>

         <div class = "box-panels">
         
         <h2><?php echo htmlspecialchars($worker['full_name']); ?></h2>  
         <h4>NID: <?php echo htmlspecialchars($worker['nid']); ?></h4>
         <h4>Phone: <?php echo htmlspecialchars($worker['phone']); ?></h4>
         <h4>Date of Birth: <?php echo htmlspecialchars($worker['dob']); ?></h4>
         <h4>Address: <?php echo htmlspecialchars($worker['address']); ?></h4>
         <h4>Ratings: <?php echo htmlspecialchars($worker['ratings']); ?></h4>
         <h4>Email: <?php echo htmlspecialchars($worker['email']); ?></h4>

      </div>

      <hr class="hr-line2">
      <hr class="hr-line2">

      <?php  

   }

}



else{


   ?>



   <p>No search results</p>
   <hr class="hr-line2">
   <hr class="hr-line2">

   <?php 


}
}
else{  ?>

   <?php  

    foreach($workers as $worker){

      ?>
   

         <div class = "box-panels">
         
         <h2><?php echo htmlspecialchars($worker['full_name']); ?></h2>  
         <h4>NID: <?php echo htmlspecialchars($worker['nid']); ?></h4>
         <h4>Phone: <?php echo htmlspecialchars($worker['phone']); ?></h4>
         <h4>Date of Birth: <?php echo htmlspecialchars($worker['dob']); ?></h4>
         <h4>Address: <?php echo htmlspecialchars($worker['address']); ?></h4>
         <h4>Ratings: <?php echo htmlspecialchars($worker['ratings']); ?></h4>
         <h4>Email: <?php echo htmlspecialchars($worker['email']); ?></h4>

      </div>

      <hr class="hr-line">
      <hr class="hr-line">

      <?php } ?>
   <?php } ?>

         </div>









<!-- EMPLOYERS -->

         <div class = "segment">
            <h2>Employers</h2>


               <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search employers with name, NID, email, address..." name="search2" required value="<?php if(isset($_GET['search2'])){echo $_GET['search2']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search2">Search </button>
         </div>

         </form>


      


         <?php 

       if(isset($_GET['search2'])){
          $values = $_GET['search2'];
       $query = "SELECT full_name, nid, ratings, phone, dob, address, email FROM employer WHERE full_name LIKE '%$values%' OR nid LIKE '%$values%' OR ratings LIKE '%$values%' OR address LIKE '%$values%' OR email LIKE '%$values%' OR phone LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){
          
         foreach($query_run as $employer){
   ?>

         <div class = "box-panels">
         
          <h2><?php echo htmlspecialchars($employer['full_name']); ?></h2>  
         <h4>NID: <?php echo htmlspecialchars($employer['nid']); ?></h4>
         <h4>Phone: <?php echo htmlspecialchars($employer['phone']); ?></h4>
         <h4>Date of Birth: <?php echo htmlspecialchars($employer['dob']); ?></h4>
         <h4>Address: <?php echo htmlspecialchars($employer['address']); ?></h4>
         <h4>Ratings: <?php echo htmlspecialchars($employer['ratings']); ?></h4>
         <h4>Email: <?php echo htmlspecialchars($employer['email']); ?></h4>

      </div>

      <hr class="hr-line2">
      <hr class="hr-line2">

      <?php  

   }

}



else{


   ?>



   <p>No search results</p>

   <hr class="hr-line2">
   <hr class="hr-line2">

   <?php 


}
}
else{  ?>

   <?php  

    foreach($employers as $employer){

      ?>
   

         <div class = "box-panels">
         
          <h2><?php echo htmlspecialchars($employer['full_name']); ?></h2>  
         <h4>NID: <?php echo htmlspecialchars($employer['nid']); ?></h4>
         <h4>Phone: <?php echo htmlspecialchars($employer['phone']); ?></h4>
         <h4>Date of Birth: <?php echo htmlspecialchars($employer['dob']); ?></h4>
         <h4>Address: <?php echo htmlspecialchars($employer['address']); ?></h4>
         <h4>Ratings: <?php echo htmlspecialchars($employer['ratings']); ?></h4>
         <h4>Email: <?php echo htmlspecialchars($employer['email']); ?></h4>

      </div>

      <hr class="hr-line">
      <hr class="hr-line">

      <?php } ?>
   <?php } ?>

         </div>


       







         <!-- JOBS -->


         <div class = "segment">
            <h2>Jobs</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search jobs with title, location, tags..." name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search">Search </button>
         </div>

         </form>


      


         <?php 

       if(isset($_GET['search'])){
          $values = $_GET['search'];
       $query = "SELECT id, description, title, tags, location, posted, pay FROM job WHERE title LIKE '%$values%' OR description LIKE '%$values%' OR tags LIKE '%$values%' OR location LIKE '%$values%' OR id LIKE '%$values%' ";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){
          
         foreach($query_run as $job){
   ?>

         <div class = "box-panels">
         
         <h3>Job ID #<?php echo htmlspecialchars($job['id']); ?></h3>  
         <h2><?php echo htmlspecialchars($job['title']); ?></h2>
         <h4><?php echo htmlspecialchars($job['description']); ?></h4>
         <h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
         <h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
         <h4>Posted On: <?php echo htmlspecialchars($job['posted']); ?></h4>

      </div>

      <hr class="hr-line2">
      <hr class="hr-line2">

      <?php  

   }

}



else{


   ?>



   <p>No search results</p>

   <hr class="hr-line2">
   <hr class="hr-line2">

   <?php 


}
}
else{  ?>

   <?php  

    foreach($jobs as $job){

      ?>
   

         <div class = "box-panels">
         
          <h3>Job ID #<?php echo htmlspecialchars($job['id']); ?></h3>  
         <h2><?php echo htmlspecialchars($job['title']); ?></h2>
         <h4><?php echo htmlspecialchars($job['description']); ?></h4>
         <h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
         <h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
         <h4>Posted On: <?php echo htmlspecialchars($job['posted']); ?> </h4>

      </div>

      <hr class="hr-line">
      <hr class="hr-line">

      <?php } ?>
   <?php } ?>



   

      

  





         
      



         </div>
      </div>










   

    <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>


 </body>

 </html>