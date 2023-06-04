<?php 

session_start();

error_reporting(E_ALL ^ E_NOTICE);

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}


if(isset($_SESSION['id'])){

   $e_id = $_SESSION['id'];

}



$title = $description = $location = $pay = $note = $tags = '';
$errors = array('title' =>'', 'description' =>'', 'location' => '', 'pay' =>'', 'note' =>'', 'tags' =>'');

if(isset($_POST['submit'])){
  

if(empty($_POST['title'])){
   $errors['title'] = 'Title field cannot be empty <br />';
}
else{
      /*echo htmlspecialchars($_POST['title']);*/
   }
   

if(empty($_POST['description'])){
   $errors['description'] = 'Description field cannot be empty <br />';
}
else{
   /*echo htmlspecialchars($_POST['description']);*/
}

if(empty($_POST['location'])){
   $errors['location'] = 'Location field cannot be empty <br />';
}
else{
   /*echo htmlspecialchars($_POST['location']);*/
}


if(empty($_POST['pay'])){
   $errors['pay'] = 'Payment field cannot be empty <br />';
}
else{
  /* echo htmlspecialchars($_POST['payment']);*/
}

/*if(empty($_POST['note'])){
   $errors['name'] = 'Please input a suitable note  <br />';
}
else{*/
   /*echo htmlspecialchars($_POST['note']);*/
/*}*/

if(empty($_POST['tags'])){
   $errors['tags'] = 'Tags field cannot be empty <br />';
}
else{
   /*echo htmlspecialchars($_POST['tags']);*/
}

}





if(array_filter($errors)){
   /*echo 'errors in form';*/
}
else{
   /*echo 'posted';*/
  /* header('Location: postJob.php');*/

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $pay = mysqli_real_escape_string($conn, $_POST['pay']);
  $note = mysqli_real_escape_string($conn, $_POST['note']);
  $tags = mysqli_real_escape_string($conn, $_POST['tags']);

  $sql = "INSERT INTO job(e_id, title, description, location, pay, note, tags) VALUES('$e_id', '$title', '$description', '$location', '$pay', '$note', '$tags')";



  if(mysqli_query($conn, $sql)){

   header('Location: ');
  }


}


 ?>

 	<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="postJob.css">


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
        <li><a href="postJob.php">Post Job</a></li>
         <li><a href="applicationList.php">Application Lists</a></li>
         <li><a href="e_dashboard.php">Profile</a></li>
         <li><a href="#">Contact</a></li>
         
  
            <a class="logout" href="e_logout.php">Log Out</a>

       </ul>
 		</div>
 	</nav>

   <section class="con">
      <div class = "up-text">
      <h4>Please fill out the following form in order to post your job on KaajAche. Be advised that KaajAche will require 100% upfront payment to ensure employer-worker safety. In case of failure to complete the service, KaajAche will return the paid amount to the employer. Thank you for choosing KaajAche!</h4> 
      </div>

      <div class="jobpost-box">
      <form class="white" action="postJob.php" method="POST">



         <label><h3>Title: </h3></label>
         <input type="text" placeholder="Write an appropriate title for the service you want to avail" name="title" value="<?php echo htmlspecialchars($title) ?>">        
         <div class="red-text">
            <?php echo $errors['title']; ?>
         </div>




         <label><h3>Description: </h3></label>
         <textarea class="textarea" id="text-box" placeholder="Describe your desired service briefly" name="description" value="<?php echo htmlspecialchars($description) ?>"></textarea> 
         <div class="red-text">
            <?php echo $errors['description']; ?>
         </div>




         <label><h3>Location: </h3></label>
         <input type="text" placeholder="Precise location of the service" name="location" value="<?php echo htmlspecialchars($location) ?>">   
         <div class="red-text">
            <?php echo $errors['location']; ?>
         </div>


         <label><h3>Payment (Hourly Rate): </h3></label>
         <input type="text" placeholder="BDT/hour" name="pay" value="<?php echo htmlspecialchars($pay) ?>">
         <div class="red-text">
            <?php echo $errors['pay']; ?>
         </div>



         <label><h3>Note (Optional): </h3></label>
         <textarea class="textarea" id="text-box" placeholder="Leave a note for the worker to better demonstrate your desired service" name="note" value="<?php echo htmlspecialchars($note) ?>"></textarea>        
         <div class="red-text">
            <?php echo $errors['note']; ?>
         </div>


         <label><h3>Tags: </h3></label>
         <input type="text" placeholder="Write relevant tags to optimize search results e.g. cook, cooking job, housesitting job..." name="tags"  value="<?php echo htmlspecialchars($tags) ?>">     
         <div class="red-text">
            <?php echo $errors['tags']; ?>
         </div>








         <div class="center">
            <input class="button" type="submit" name="submit" value="Post Job On KaajAche">
         </div>
      </form>
   </div>
   </section>

 <footer id="main-footer">
         <p>Copyright &copy; 2022 KaajAche</p>
    </footer>
</body>
</html>




