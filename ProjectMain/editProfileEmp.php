
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="editProfile.css">
	<title>Employer Edit Profile</title>
</head>

<body class="profile-page">

	<div class="wrapper">
		<form action="" method="POST">

			<h2>Edit Profile</h2>

			<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if(isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<div class="inputBox">
				<input type="text" name="id" placeholder="Enter your Employer ID" required>
			</div>

			<div class="inputBox">
				<input type="text" name="full_name" placeholder="Full Name" required>
			</div>

			<div class="inputBox">
				<input type="email" name="email" placeholder="Email" required>
			</div>

			<div class="inputBox">
				<input type="password" name="password" placeholder="Password" required>
			</div>

			<div class="inputBox">
				<input type="text" name="address" placeholder="Address" required>
			</div>

			<div class="inputBox">
				<input type="tel" name="phone" placeholder="Phone" required>
			</div>

			<div class="inputBox">
				<input type="text" name="bankAcc" placeholder="Bank Account No." required>
			</div>

			<button type="submit" name="update">Update Profile</button>
			<a href="e_dashboard.php" target="_blank">Return to Profile</a>
		</form>
	</div>

</body>
</html>


<?php 

include "db_conn.php";

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$sql = "UPDATE employer SET full_name = '$_POST[full_name]', email = '$_POST[email]', password = '$_POST[password]', address = '$_POST[address]', phone = '$_POST[phone]', bank_acc_no = '$_POST[bankAcc]' where id = '$_POST[id]'";

	$result = mysqli_query($conn, $sql);

	 if($result == TRUE)
        {
            header("Location: editProfileEmp.php?success=Data updated");
       
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

 ?>
