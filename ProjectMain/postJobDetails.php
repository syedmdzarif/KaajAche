<?php 

session_start();

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}



if(isset($_GET['id'])){

   $id = mysqli_real_escape_string($conn, $_GET['id']);



   $sql = "SELECT * FROM job WHERE id = $id";
}

$result = mysqli_query($conn, $sql);

$job = mysqli_fetch_assoc($result);

 ?>

 	<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="postJobDetails.css">


 	<title>KaajAche</title>
 	<link rel="stylesheet" type="text/css" href="postJobDetails.css">
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
 		 	<li><a href="jobList.php">All Jobs</a></li>
 		 	<li><a href="#">Profile</a></li>
 		 	<li><a href="#">Help</a></li>
 		 	<a class="logout" href="w_logout.php">Log Out</a>
 		 </ul>
 		</div>
 	</nav>


   <div class = "box-2">

      <?php if($job): ?>

       <h2><?php echo htmlspecialchars($job['title']); ?></h2>  
         <h4><?php echo htmlspecialchars($job['description']); ?></h4>
         <h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
          
         
         <h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
         <h4>Tags: <?php echo htmlspecialchars($job['tags']); ?></h4>
         <h4>Posted: <?php echo htmlspecialchars($job['posted']); ?></h4>

         
         <a class ="btn" href="jobApplication.php?id=<?php echo $job['id']?>" type="submit" value="Apply" name=""><button class="button">Apply</button></a>

         </div>


      <?php else: ?>

      <?php endif; ?>


   </div>





   <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>





 </body>
 </html>
