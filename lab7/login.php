<?php 

session_start();

$error = false;

$action = $_POST['action'];

if ($action == "Login" ) {

  $usr = $_POST['username'];
  $submitted_password = $_POST['password'];


	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
	
	$result = $mysqli->query("SELECT password FROM OurAwesomeTablesForWebApp WHERE username='$usr'");
	$row = $result->fetch_row();
	$stored_password = $row[0];
	
	$mysqli->close(); 
	
	if ($stored_password != null && password_verify($submitted_password,$stored_password)) {
	   $_SESSION['authenticated'] = true;
	   //echo '<p><b>You are authenticated.</b></p>';
	  // echo '<p>Typically, we would redirect to a session protected page.</p>';
	  // echo '<p><a href="logout.php">Logout</a></p>';


	   header("Location: http://www.sienasellbacks.com/ba13vall/lab7/user_page.php");


	   die();
	}
	else {
		 $error = true;
	}

}
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Login</title>
  <body>
  <form method="post" action="login.php">
    <h2>Login</h2>
    <label>Username: <input type="text" name="username"></label>
    <label>Password: <input type="password" name="password"></label>
    <input type="submit" name="action" value="Login"> 
    <? if($error) echo '<p>Login failed</p>'; ?>
  </form>
	</body>
</html>