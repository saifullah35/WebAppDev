<?php session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Insert user</title>
  <body>
  
<?
$action = $_POST['action'];

if ($action == "Insert User" ) {

  $usr = $_POST['username'];
  $pwd = $_POST['password'];

  $usertype = $_POST['usertype'];
  $games = $_POST['games'];
  $points = $_POST['points'];

  $pwd = password_hash($pwd, PASSWORD_BCRYPT);

	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				
	$sql = "INSERT INTO OurAwesomeTablesForWebApp (username, password, usertype, games, points) VALUES ('$usr','$pwd', '$usertype', '$games', '$points')";
	
	if ($mysqli->query($sql)) {
      echo '<p>'.$usr. ' was inserted.</p>
            <p><a href="insert_user.php">Insert Another User</a></p>';
            echo '<p><a href="logout.php">Logout</a></p>';

      die();
   }
   elseif ($mysqli->errno == 1062) {
      echo '<p>'.$usr. ' already exists.</p>
            <p><a href="insert_user.php">Insert Another User</a></p>';
            echo '<p><a href="logout.php">Logout</a></p>';
            
      die();
   }
   else {
      die("Error ($mysqli->errno) $mysqli->error");
   } 
	
	$mysqli->close();
}
?>


  <form method="post" action="insert_user.php">
    <h2>Insert User</h2>
    <label>Username: <input type="text" name="username"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <label>Usertype: <input type="text"  name="usertype"></label><br>
    <label>Games: <input type="text"  name="games"></label><br>
    <label>Points: <input type="text"  name="points"></label><br>
    <input type="submit" name="action" value="Insert User"> 
  </form>
	</body>
</html>