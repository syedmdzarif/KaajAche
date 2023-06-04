<?php 
session_start();

if(isset($_SESSION['full_name']) && ($_SESSION['ratings'])){
      $w_id = $_SESSION['id']; 



      $conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}







$sql = "SELECT job.title job_title, job_history.j_id job_id, job.description job_description, job.location job_location, job.tags job_tags, job.pay job_pay, job.note job_note, employer.full_name employer_name, employer.email employer_email, employer.phone employer_phone, employer.ratings employer_ratings, employer.nid employer_nid FROM employer INNER JOIN job_history ON employer.id = job_history.e_id INNER JOIN job ON job_history.j_id = job.id WHERE job_history.w_id = '$w_id'";

$result = mysqli_query($conn, $sql);

$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KaajAche</title>
	<link rel="stylesheet" type="text/css" href="w_dashboard.css">
</head>
<body>

	<header id="main-header">
      <div class="container">
         <h1>KaajAche </h1>
      </div>
   </header>

<nav id="navbar">
      <div class="container">
       <ul>
         <li><a href="jobList.php">All Jobs</a></li>
         <li><a href="w_dashboard.php">Profile</a></li>
         <li><a href="#">Contact</a></li>
         <li><a href="editProfileW.php">Edit Profile</a></li>
         
  
         	<a class="logout" href="w_logout.php">Log Out</a>

       </ul>
      </div>
   </nav>

   <div class="box-2">

	<h1><?php echo $_SESSION['full_name']; ?> #<?php echo $_SESSION['id']; ?> </h1>
	<h3><?php echo $_SESSION['ratings']; ?></h3>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
   
</div>

   <div class="box-3">
      <img src="modProfile1.png" width:"600px" height:"600px">
   </div>


   <div class="box-5">
      <h2>Job History</h2>
   </div>



    <?php foreach($jobs as $job){ ?> 

   <div class="box-4">


         
    <h3>Job ID #<?php echo htmlspecialchars($job['job_id']); ?></h3>
     <h2><?php echo htmlspecialchars($job['job_title']); ?></h2>
      <h4><?php echo htmlspecialchars($job['job_description']); ?></h4>
      <h4>Note: <?php echo htmlspecialchars($job['job_note']); ?></h4>
<h4>Location: <?php echo htmlspecialchars($job['job_location']); ?></h4>
<h4>Tags Used: <?php echo htmlspecialchars($job['job_tags']); ?></h4>
<h4>Payment Offered: <?php echo htmlspecialchars($job['job_pay']); ?> BDT/Hour</h4>
<br>
<h2>Employer Details</h2>

<h4>Name: <?php echo htmlspecialchars($job['employer_name']); ?></h4>
<h4>Email: <?php echo htmlspecialchars($job['employer_email']); ?></h4>
<h4>Phone: <?php echo htmlspecialchars($job['employer_phone']); ?></h4>


<h4>Ratings: <?php echo htmlspecialchars($job['employer_ratings']); ?></h4>


      





   </div>

   <?php } ?> 









   <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>

</body>
</html>

<?php 
} else { 
	header("Location: worker_login.php");
	exit();
} 
?>