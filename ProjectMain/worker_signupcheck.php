<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['NID']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['dob']) && isset($_POST['genders']) && isset($_POST['bankAcc'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $name = validate($_POST['name']);
    $NID = validate($_POST['NID']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);
    $phone = validate($_POST['phone']);
    $dob = validate($_POST['dob']);
    $genders = validate($_POST['genders']);
    $bankAcc = validate($_POST['bankAcc']);


    if (empty($name)) {
        header("Location: worker_signup.php?error=User Name is required");
        exit();
    }	
    else if(empty($NID)){
        header("Location: worker_signup.php?error=NID is required");
        exit();
    }	
    else if(empty($email)){
        header("Location: worker_signup.php?error=Email is required");
        exit();
    }
    else if(empty($password)){
        header("Location: worker_signup.php?error=Password is required");
        exit();
    }
    else if(empty($address)){
        header("Location: worker_signup.php?error=Address is required&$user_data");
        exit();
    }
    else if(empty($phone)){
        header("Location: worker_signup.php?error=Phone number is required&$user_data");
        exit();
    }
    else if(empty($dob)){
        header("Location: worker_signup.php?error=DOB is required");
        exit();
    }
    else if(empty($genders)){
        header("Location: worker_signup.php?error=Gender is required");
        exit();
    }
    else if(empty($bankAcc)){
        header("Location: worker_signup.php?error=Bank Account Number is required");
        exit();
    }
    else{
        // SET foreign_key_checks = 0;
        $sql = "INSERT INTO worker(full_Name, nid, email, password, address, phone, dob, gender, bank_acc_no) VALUES ('$name', '$NID', '$email', '$password', '$address', '$phone', '$dob', '$genders', '$bankAcc')";

        // $result = $conn->query($sql);
        $result = mysqli_query($conn, $sql);

        //Insert query results
        if($result == TRUE)
        {
            header("Location: worker_signup.php?success=Your account has been created successfully");
        //      exit();
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
 }
 