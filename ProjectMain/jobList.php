<?php 

error_reporting(E_ALL ^ E_NOTICE);


$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
	echo 'connection error: ' . mysqli_connect_error();
}



$sql1 = 'SELECT * FROM job';


$result = mysqli_query($conn, $sql1);



$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>

 	<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="jobList.css">


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
 		 	<li><a href="#">Profile</a></li>
 		 	<li><a href="#">Help</a></li>
 		 	<a class="logout" href="w_logout.php">Log Out</a>
 		 </ul>
 		</div>
 	</nav>


 	<!-- FILTER -->




 	<!-- SORT BY PAY -->

<div class="sort-box">
 <form action="" method="GET">
 	
 		<div class = "box-a">
 			
 			<button type="submit" class="sorting" name="sort_button">Filter By - Highest Paying - Lowest Paying</button>
 		</div>
 	

 	</form>


 	<!-- max pay -->

 		<form action="" method="GET">
 			
 		<div class = "box-b">
 			
 			<button type="submit" class="sorting" name="max_pay_btn">Filter By - Most Paying</button>
 		</div>
 	

 	</form>


 	<!-- avg pay -->

 		<form action="" method="GET">
 		
 		<div class = "box-c">
 			
 			<button type="submit" class="sorting" name="avg_pay_btn">Filter By - Average Salary</button>
 		</div>
 	

 	</form>
 </div>



 	<?php 


 	if(isset($_GET['sort_button'])){
 		$values = $_GET['search'];
 		$query = "SELECT id, title, description, tags, location, pay, posted FROM job WHERE title LIKE '%$values%' OR description LIKE '%$values%' OR tags LIKE '%$values%' OR location LIKE '%$values%' OR pay LIKE '%values%' OR posted LIKE '%values%' ORDER BY pay DESC";
 		$query_run = mysqli_query($conn, $query);
 		if(mysqli_num_rows($query_run) > 0){
 			 
 			foreach($query_run as $job){
 	?>

 			<div class = "box-2">
 			
 			<h2><?php echo htmlspecialchars($job['title']); ?></h2>  
			<h4><?php echo htmlspecialchars($job['description']); ?></h4>
			<h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
			 
			
			<h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
			<h4>Tags: <?php echo htmlspecialchars($job['tags']); ?></h4>
			<h4>Posted: <?php echo htmlspecialchars($job['posted']); ?></h4>

			
			<a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>
			<!-- <input class ="button" type="submit" value="Apply" name=""> -->

			</div>
				<?php
				
 			}

 		}

 	}

 		

/*
 		<!-- SORT BY PAY END -->


 		<!-- MAX PAY -->*/

 	


 	elseif(isset($_GET['max_pay_btn'])){

 		$values = $_GET['search'];
 		$query = "SELECT id, title, description, tags, location, pay, posted FROM job ORDER BY pay DESC LIMIT 1";
 		$query_run = mysqli_query($conn, $query);
 		if(mysqli_num_rows($query_run) > 0){

 			 
 			foreach($query_run as $job){
 	?>

 			<div class = "box-2">
 			
 			<h2><?php echo htmlspecialchars($job['title']); ?></h2>  
			<h4><?php echo htmlspecialchars($job['description']); ?></h4>
			<h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
			 
			
			<h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
			<h4>Tags: <?php echo htmlspecialchars($job['tags']); ?></h4>
			<h4>Posted: <?php echo htmlspecialchars($job['posted']); ?></h4>

			
			<a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>
			<!-- <input class ="button" type="submit" value="Apply" name=""> -->

			</div>
				<?php
				
 			}

 		}

 	}




 	elseif(isset($_GET['avg_pay_btn'])){
 		
 		$query = "SELECT avg(pay) as py FROM job";
 		$query_run = mysqli_query($conn, $query);
 		if(mysqli_num_rows($query_run) > 0){
 			 
 			foreach($query_run as $job){
 	?>

 			<div class = "box-2">
 			
 			<h3>The average payment currently offered on KaajAche is: <?php echo htmlspecialchars($job['py']); ?> BDT/Hour</h3>  
			
			</div>
				<?php
				
 			}

 		}

 	}

 		


 		 else{ ?>
 









		<!-- MAX PAY END --> 







 	


 	


 	<!-- SEARCH BAR -->

 	<form action="" method="GET">
 		<div class = "form-box">
 			<input type="text" class="search-field" placeholder="Search jobs with title, location, tags..." name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"/>
 			<button type="submit" class="search-btn" name="submit-search">Search </button>
 		</div>

 	</form>



 	<?php 
 	if(isset($_GET['search'])){
 		$values = $_GET['search'];
 		$query = "SELECT id, title, description, tags, location, pay, posted FROM job WHERE title LIKE '%$values%' OR description LIKE '%$values%' OR tags LIKE '%$values%' OR location LIKE '%$values%' OR pay LIKE '%values%' OR posted LIKE '%values%' ";
 		$query_run = mysqli_query($conn, $query);
 		if(mysqli_num_rows($query_run) > 0){
 			 
 			foreach($query_run as $job){
 	?>

 			<div class = "box-2">
 			
 			<h2><?php echo htmlspecialchars($job['title']); ?></h2>  
			<h4><?php echo htmlspecialchars($job['description']); ?></h4>
			<h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
			 
			
			<h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
			<h4>Tags: <?php echo htmlspecialchars($job['tags']); ?></h4>
			<h4>Posted: <?php echo htmlspecialchars($job['posted']); ?></h4>

			
			<a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>
			<!-- <input class ="button" type="submit" value="Apply" name=""> -->

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
 	 


 	<!-- JOB LISTS -->

 	 <?php foreach($jobs as $job){ ?> 
 		<div class = "box-2">
 			
 			<h2><?php echo htmlspecialchars($job['title']); ?></h2>  
			<h4><?php echo htmlspecialchars($job['description']); ?></h4>
			<h4>Location: <?php echo htmlspecialchars($job['location']); ?></h4>
			 
			
			<h4>Payment offered: <?php echo htmlspecialchars($job['pay']); ?> BDT/ hour</h4>
			<h4>Tags: <?php echo htmlspecialchars($job['tags']); ?></h4>
			<h4>Posted: <?php echo htmlspecialchars($job['posted']); ?></h4>

			
			<a class ="btn" href="postJobDetails.php?id=<?php echo $job['id']?>" type="submit" value="View Details" name=""><button class="button">View Details</button></a>
			<!-- <input class ="button" type="submit" value="Apply" name=""> -->

	</div>
		
	<?php } ?> 


<?php } ?>

	<!-- JOB LISTS END -->




<?php } ?>


	 <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>

 
 </body>
 </html>