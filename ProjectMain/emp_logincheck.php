<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: emp_login.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: emp_login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        // $pass = md5($pass);

        
		$sql = "SELECT * FROM employer WHERE email='$email' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			if($row['email'] === $email && $row['password'] === $password){
				// $_SESSION['Email'] = $row['Email'];
				$_SESSION['full_name'] = $row['full_name'];
				$_SESSION['ratings'] = $row['ratings'];
				$_SESSION['id'] = $row['id'];
				header("Location: e_dashboard.php");
				exit();
			} else {
				header("Location: emp_login.php?error=Incorrect email or password");
				exit();
			}
		} else {
			header("Location: emp_login.php?error=Incorrect email or password");
			exit();
		}
		
	}
	
}else{
	header("Location: emp_login.php");
	exit();
} 