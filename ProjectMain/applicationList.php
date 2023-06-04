<?php 

session_start();

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
	echo 'connection error: ' . mysqli_connect_error();
}

if(isset($_SESSION['id'])){

   $e_id = $_SESSION['id'];

}



/*$sql1 = "SELECT letter, bid FROM application_list WHERE j_id IN (SELECT id FROM job WHERE e_id = $e_id)";

$sql2 = "SELECT * FROM worker WHERE id IN (SELECT w_id FROM application_list WHERE j_id IN (SELECT id FROM job WHERE e_id = $e_id))";*/


$sql1 = "SELECT * 
FROM application_list JOIN worker ON application_list.w_id = worker.id 
WHERE application_list.j_id IN (SELECT id 
                                from job 
                                where e_id = $e_id)";



/*$sql2 = "SELECT full_name, ratings, letter, bid FROM application_list JOIN worker ON application_list.w_id = worker.id WHERE applicationList.j_id IN (SELECT id FROM job WHERE e_id = $e_id)";*/







$result = mysqli_query($conn, $sql1);
/*$result2 = mysqli_query($conn, $sql2);*/

$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
/*$workers = mysqli_fetch_all($result2, MYSQLI_ASSOC);*/









/*if(isset($_POST['submit'])){
}

$sql3 = "INSERT INTO job_history(w_id, e_id, j_id) VALUES ('$w_id', '$e_id', '$j_id')";

  if(mysqli_query($conn, $sql)){

   header('Location: ');
  }
*/



 ?>

 	<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    


 	<title>KaajAche</title>
   <link rel="stylesheet" type="text/css" href="applicationList.css">
 
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
         <li><a href="applicationList.php">Application Lists</a></li>
         <li><a href="e_dashboard.php">Profile</a></li>
         <li><a href="#">Contact</a></li>
         
  
            <a class="logout" href="e_logout.php">Log Out</a>

       </ul>
      </div>
   </nav>

   <div class="letter-box">

      <h3>Applications from intrested workers</h3>

   </div>


   <?php foreach($jobs as $job){ ?> 
      
     
      <div class = "box-1">

         <h2><?php echo htmlspecialchars($job['full_name']); ?></h2>
         
         <h4><?php echo htmlspecialchars($job['letter']); ?></h4>  
         <h4>Bid: <?php echo htmlspecialchars($job['bid']); ?> BDT/hour</h4>
         <h4>Worker Rating: <?php echo htmlspecialchars($job['ratings']); ?></h4>
          

        

         
         <a class ="btn" href="applicationListDetails.php?app_id=<?php echo $job['app_id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>

   </div>
      
   <?php } ?> 


















   <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>

 </body>

 </html>


