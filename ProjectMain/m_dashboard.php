<?php 
session_start();

if(isset($_SESSION['full_name']) && ($_SESSION['ratings'])){


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moderator Dashboard</title>
	<link rel="stylesheet" type="text/css" href="modProfile.css">
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
         <li><a href="appliactionList">Job Applications</a></li>
         <li><a href="m_dashboard.php">Profile</a></li>
         <li><a href="#">Contact</a></li>
         
  
         	<a class="logout" href="w_logout.php">Log Out</a>

       </ul>
      </div>
   </nav>

   <div class="box-2">

	<h1><?php echo $_SESSION['full_name']; ?></h1>
	<h2><?php echo $_SESSION['ratings']; ?></h2>
</div>

</body>
</html>

<?php 
} else { 
	header("Location: m_login.php");
	exit();
} 
?>