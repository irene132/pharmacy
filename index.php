<?php
//session start
session_start();
$conn=mysqli_connect('localhost','root','','medics');

//check if login data are inserted.
if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	//hashed password
	$hashed=sha1("$pass");

	$result=mysqli_query($conn,"SELECT * FROM admin WHERE username='$user' AND password='$hashed'");
	$count=mysqli_fetch_array($result);

	if($count>0){
		header("location:login.php");
	}
	else{
		echo "<h5><b><i>Wrong username or password!!</h5></b></i>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<title>login page</title>
</head>
<body class="bg-light" >
  <div class="container">
    <div class="row mt-5 ">
      <div class="col-lg-4 bg-white m-auto">
          <h5 class="text-center pt-3">please login here</h5>

        <form action="index.php" method="POST">
            <div class="input-group mb-5">
             <span class="input-group-text"><i class="fa fa-user"></i></span>
             <input type="text" class="form-control" name="username" placeholder="Enter Username"  required>
            </div>
            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
              <input required type="password" class="form-control"  name="password" placeholder="Enter password">
            </div>
        
              <div class="col-md-12 text-center">
                <button type="submit" class="btn-success btn-lg" name="login" value="login">login</button>
        
               
          </div>
      
        </form>
      </div>
    </div>
  </div>
      
     	
  
     
     
    
</body>
</html>
