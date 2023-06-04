<?php 

session_start();

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}


if(isset($_SESSION['id'])){

   $e_id = $_SESSION['id'];

}












if(isset($_GET['app_id'])){

   $app_id = mysqli_real_escape_string($conn, $_GET['app_id']);



$sql1 = "SELECT *
FROM application_list 
JOIN worker 
ON application_list.w_id = worker.id 
WHERE application_list.app_id = '$app_id'"; 


}

$result = mysqli_query($conn, $sql1);

$job = mysqli_fetch_assoc($result);



/*DELETE*/


/*if(isset($_POST['delete'])){

	$id_to_delete = mysqli_real_escape_string($conn, $_GET['id_to_delete']);

	$sql4 = "DELETE FROM application_list WHERE app_id = '$id_to_delete'";


	if(mysqli_query($conn, $sql4)){
		header('Location: ');

	}

}*/


if(isset($_POST['accept'])){

}


/*$worker_id = "SELECT worker.id FROM worker JOIN application_list ON worker.id = application_list.w_id WHERE application_list.app_id = '$app_id'";

$result_worker = mysqli_query($conn, $worker_id);

$work_id = mysqli_fetch_assoc($result_worker);


$w_id = $work_id[id];
*/



/*$sql5 = "INSERT INTO job_history (e_id, w_id) VALUES('$e_id', SELECT worker.id FROM worker JOIN application_list ON worker.id = application_list.w_id WHERE application_list.app_id = '$app_id')";*/



$sql5 = "INSERT INTO job_history (j_id, w_id, e_id) SELECT job.id, worker.id, job.e_id
FROM worker INNER JOIN application_list ON worker.id = application_list.w_id 
INNER JOIN job ON application_list.j_id = job.id where application_list.app_id = '$app_id'";



if(mysqli_query($conn, $sql5)){

   header('Location: ');
  }




  



 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>KaajAche</title>
 	<link rel="stylesheet" type="text/css" href="applicationListDetails.css">
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


   <div class = "box-1">

      <?php if($job): ?>

         <h2><?php echo htmlspecialchars($job['full_name']); ?></h2>
         
         <h4><?php echo htmlspecialchars($job['letter']); ?></h4>  
         <h4>Bid: <?php echo htmlspecialchars($job['bid']); ?> BDT/hour</h4>
         <h4>Worker Rating: <?php echo htmlspecialchars($job['ratings']); ?></h4>
         <h4>Worker Rating: <?php echo htmlspecialchars($job['app_id']); ?></h4>




         <!-- DELETE -->




     <!--     <form action="applicationListDetails.php" method="POST">

         	<input type="hidden" name="id_to_delete" value="<?php echo $job['app_id']; ?>" >
         	<input type ="submit" name="delete" value="Delete">


         </form> -->
          

        

         
         <a class ="btn" href="applicationListDetails.php?app_id=<?php echo $job['app_id']?>" type="submit" value="View Details" name="accept"><button class="button">Accept</button></a>

   

     

     </div>




      <?php else: ?>

      <?php endif; ?>


   </div>






   <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>

 
 </body>
 </html>