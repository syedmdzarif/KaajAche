<?php 

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}





$sql = "SELECT job_history.j_id AS job_id, job_history.w_id worker_id, job_history.e_id employer_id, job_history.id history_id, job.title job_title, job.description job_description, job.location job_location, job.pay job_pay, job.tags job_tags, job.posted job_posted, employer.full_name employer_name, employer.email employer_email, employer.nid employer_nid, employer.bank_acc_no employer_bank, employer.phone employer_phone, employer.ratings employer_ratings ,employer.address employer_address, worker.full_name worker_name, worker.email as worker_email, worker.nid worker_nid, worker.bank_acc_no worker_bank, worker.phone worker_phone, worker.ratings worker_ratings, worker.address worker_address 
FROM worker INNER JOIN job_history ON worker.id = job_history.w_id INNER JOIN job ON 
job_history.j_id = job.id INNER JOIN employer ON job.e_id = employer.id";



$result = mysqli_query($conn, $sql);

$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);







 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>KaajAche</title>
 	<link rel="stylesheet" type="text/css" href="jobHistoryMod.css">
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
         <li><a href="jobHistoryMod.php">Job History</a></li>
 		 	<a class="logout" href="m_logout.php">Log Out</a>
 		 </ul>
 		</div>
 	</nav>



 <!-- 	<div class="letter-box">

      <h3>Details regarding all job histories</h3>

   </div> -->


   	<!-- SEARCH BAR -->

 	<form action="" method="GET">
 		<div class = "form-box">
 			<input type="text" class="search-field" placeholder="Search job history with job title, employer name, worker id, history id and more..." name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"/>
 			<button type="submit" class="search-btn" name="submit-search">Search </button>
 		</div>

 	</form>




 		<?php 
 	if(isset($_GET['search'])){
 		$values = $_GET['search'];
 		$query = "SELECT job_history.j_id job_id, job_history.w_id worker_id, job_history.e_id employer_id, job_history.id history_id, job.title job_title, job.description job_description, job.location job_location, job.pay job_pay, job.tags job_tags, job.posted job_posted, employer.full_name employer_name, employer.email employer_email, employer.nid employer_nid, employer.bank_acc_no employer_bank, employer.phone employer_phone, employer.ratings employer_ratings ,employer.address employer_address, worker.full_name worker_name, worker.email worker_email, worker.nid worker_nid, worker.bank_acc_no worker_bank, worker.phone worker_phone, worker.ratings worker_ratings, worker.address worker_address FROM worker INNER JOIN job_history ON worker.id = job_history.w_id INNER JOIN job ON job_history.j_id = job.id INNER JOIN employer ON job.e_id = employer.id WHERE worker.full_name LIKE '%$values%' OR worker.nid LIKE '%$values%' OR job_history.w_id LIKE '%$values%' OR worker.ratings LIKE '%$values%' OR worker.address LIKE '%$values%' OR worker.phone LIKE '%$values%' OR worker.bank_acc_no LIKE '%$values%' OR worker.email LIKE '%$values%' OR employer.full_name LIKE '%$values%' OR employer.nid LIKE '%$values%' OR job_history.e_id LIKE '%$values%' OR employer.ratings LIKE '%$values%' OR employer.address LIKE '%$values%' OR employer.phone LIKE '%$values%' OR employer.bank_acc_no LIKE '%$values%' OR employer.email LIKE '%$values%' OR job_history.j_id LIKE '%$values%' OR job.title LIKE '%$values%' OR job.description LIKE '%$values%' OR job.location LIKE '%$values%' OR job.pay LIKE '%$values%' OR job.tags LIKE '%$values%' OR job.posted LIKE '%$values%' OR job_history.id LIKE '%$values%'";






 		$query_run = mysqli_query($conn, $query);
 		if(mysqli_num_rows($query_run) > 0){
 			 
 			foreach($query_run as $job){
 	?>

 			<div class = "box-1">



 			
 			
			<h4>Job History #<?php echo htmlspecialchars($job['history_id']); ?> </h4>


         <h2>Job Details</h2>



         <h4>Job ID #<?php echo htmlspecialchars($job['job_id']); ?> </h4>
         <h4>Title:  <?php echo htmlspecialchars($job['job_title']); ?> </h4>
         <h4>Description:  <?php echo htmlspecialchars($job['job_description']); ?> </h4>
         <h4>Location:  <?php echo htmlspecialchars($job['job_location']); ?> </h4>
         <h4>Payment Offered:  <?php echo htmlspecialchars($job['job_pay']); ?> BDT/Hour </h4>
         <h4>Tags Used:  <?php echo htmlspecialchars($job['job_tags']); ?> </h4>
         <h4>Posted On:  <?php echo htmlspecialchars($job['job_posted']); ?> </h4>



<br>


         <h2>Employer Details</h2>


         
         <h4>Employer ID #<?php echo htmlspecialchars($job['employer_id']); ?> </h4>
         <h4>Name: <?php echo htmlspecialchars($job['employer_name']); ?> </h4>
         <h4>Ratings:  <?php echo htmlspecialchars($job['employer_ratings']); ?> </h4>
         <h4>NID:  <?php echo htmlspecialchars($job['employer_nid']); ?> </h4>
         <h4>Address:  <?php echo htmlspecialchars($job['employer_address']); ?> </h4>
         <h4>Email: <?php echo htmlspecialchars($job['employer_email']); ?> </h4>
         <h4>Phone:  <?php echo htmlspecialchars($job['employer_phone']); ?></h4>
         <h4>Bank Account No #<?php echo htmlspecialchars($job['employer_bank']); ?> </h4>
       

<br>


         <h2>Worker Details</h2>


         
          <h4>Worker ID #<?php echo htmlspecialchars($job['worker_id']); ?> </h4>
         <h4>Name: <?php echo htmlspecialchars($job['worker_name']); ?> </h4>
         <h4>Ratings:  <?php echo htmlspecialchars($job['worker_ratings']); ?> </h4>
         <h4>NID:  <?php echo htmlspecialchars($job['worker_nid']); ?> </h4>
         <h4>Address:  <?php echo htmlspecialchars($job['worker_address']); ?> </h4>
         <h4>Email: <?php echo htmlspecialchars($job['worker_email']); ?> </h4>
         <h4>Phone:  <?php echo htmlspecialchars($job['worker_phone']); ?></h4>
         <h4>Bank Account No #<?php echo htmlspecialchars($job['worker_bank']); ?> </h4>



         <a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>

         <a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">Payment</button></a>
			


      





			</div>
				<?php
				
 			}

 		}
 		else{

 			?>

 			

 			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No search results</p>
<?php
 		}
 	}






else{ ?>







   <?php foreach($jobs as $job){ ?> 
      
     
      <div class = "box-1">

       
         
        
         <h4>Job History #<?php echo htmlspecialchars($job['history_id']); ?> </h4>


         <h2>Job Details</h2>



         <h4>Job ID #<?php echo htmlspecialchars($job['job_id']); ?> </h4>
         <h4>Title:  <?php echo htmlspecialchars($job['job_title']); ?> </h4>
         <h4>Description:  <?php echo htmlspecialchars($job['job_description']); ?> </h4>
         <h4>Location:  <?php echo htmlspecialchars($job['job_location']); ?> </h4>
         <h4>Payment Offered:  <?php echo htmlspecialchars($job['job_pay']); ?> BDT/Hour </h4>
         <h4>Tags Used:  <?php echo htmlspecialchars($job['job_tags']); ?> </h4>
         <h4>Posted On:  <?php echo htmlspecialchars($job['job_posted']); ?> </h4>



<br>


         <h2>Employer Details</h2>


         
         <h4>Employer ID #<?php echo htmlspecialchars($job['employer_id']); ?> </h4>
         <h4>Name: <?php echo htmlspecialchars($job['employer_name']); ?> </h4>
         <h4>Ratings:  <?php echo htmlspecialchars($job['employer_ratings']); ?> </h4>
         <h4>NID:  <?php echo htmlspecialchars($job['employer_nid']); ?> </h4>
         <h4>Address:  <?php echo htmlspecialchars($job['employer_address']); ?> </h4>
         <h4>Email: <?php echo htmlspecialchars($job['employer_email']); ?> </h4>
         <h4>Phone:  <?php echo htmlspecialchars($job['employer_phone']); ?></h4>
         <h4>Bank Account No #<?php echo htmlspecialchars($job['employer_bank']); ?> </h4>
       

<br>


         <h2>Worker Details</h2>


         
          <h4>Worker ID #<?php echo htmlspecialchars($job['worker_id']); ?> </h4>
         <h4>Name: <?php echo htmlspecialchars($job['worker_name']); ?> </h4>
         <h4>Ratings:  <?php echo htmlspecialchars($job['worker_ratings']); ?> </h4>
         <h4>NID:  <?php echo htmlspecialchars($job['worker_nid']); ?> </h4>
         <h4>Address:  <?php echo htmlspecialchars($job['worker_address']); ?> </h4>
         <h4>Email: <?php echo htmlspecialchars($job['worker_email']); ?> </h4>
         <h4>Phone:  <?php echo htmlspecialchars($job['worker_phone']); ?></h4>
         <h4>Bank Account No #<?php echo htmlspecialchars($job['worker_bank']); ?> </h4>


         <a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>

         <a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">Payment</button></a>

        
         
          

        

         
         

   </div>
      
   <?php } ?> 


   <?php } ?>









 	 <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>
 
 </body>
 </html>