<?php 

error_reporting(E_ALL ^ E_NOTICE);


$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}

 $letter = mysqli_real_escape_string($conn, $_POST['letter']);
   $bid = mysqli_real_escape_string($conn, $_POST['bid']);


session_start();


if(isset($_SESSION['id'])){
   $w_id = $_SESSION['id'];
}

if(isset($_GET['id'])){

   $j_id = mysqli_real_escape_string($conn, $_GET['id']);

}



 $sql = "INSERT INTO application_list(w_id, j_id, letter, bid) VALUES('$w_id', '$j_id', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '200')";

   if(mysqli_query($conn, $sql)){
      header('Location: ');
   }








 ?>

 	<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="jobApplication.css">


 	<title>KaajAche</title>
 	<link rel="stylesheet" type="text/css" href="jobList.css">
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
 		 	<li><a href="w_dashboard.php">Profile</a></li>
 		 	<li><a href="#">Help</a></li>
 		 	<a class="logout" href="w_logout.php">Log Out</a>
 		 </ul>
 		</div>
 	</nav>

   <div class = "up-text">
      <h4>Please note that KaajAche requires a 15% commission on each job, the hourly rate displayed in the job listing is exclusive of the commision. With 100% completion of the job, KaajAche will provide the payment via your desired payment method. Thank you for choosing KaajAche!</h4> 
   </div>

   <div class="letter-box">
      <form class="white" action="jobApplication.php" method="POST">
      <h4>Please write your application letter in the provided form. Please note that your application letter is directly delivered to the respective employer, and use of any foul language or any form of unprofessionalism will lead to ban from KaajAche. </h4> 


      <textarea class="textarea" id="text-box" placeholder="Mention your expertise, previous experience reagrding the job..." name="letter"></textarea> 

      <h3>Bid: </h3>

      <input type="text" class="textfield" placeholder="Place your bid (BDT/Hour)" name="bid">  

      <input class="button" type="submit" name="submit" value="Send">
      

      </form>
   </div>

   
     

   </div>










   <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>





 </body>
 </html>