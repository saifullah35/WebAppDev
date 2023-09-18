<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Delete user</title>
  <body>
  
<?php
$action = $_POST['action'];

if ($action == "Delete User" ) {

  $usr = $_POST['username'];

	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				
	$sql = "DELETE FROM OurAwesomeTablesForWebApp WHERE username='$usr'";
	$mysqli->query($sql);

	if ($mysqli->affected_rows > 0) {
		echo '<p>'.$usr. ' was deleted.</p>
					<p><a href="delete_user.php">Delete Another User</a></p>';
					echo '<p><a href="logout.php">Logout</a></p>';
					
		die();
	}
	else  {
		echo '<p>'.$usr. ' was not found.</p>
					<p><a href="delete_user.php">Delete Another User</a></p>';
					echo '<p><a href="logout.php">Logout</a></p>';

		
		die();
	}
	
	$mysqli->close();
	
}

?>

  <form method="post" action="delete_user.php">
    <h2>Delete User</h2>
    <!-- <label>Username: <input type="text" name="username"></label><br> -->

	<?php

        $mysqli = new mysqli("localhost" , "sienasel_sbxusr" , "Sandbox@)!&" , "sienasel_sandbox");

		$result = $mysqli->query("SELECT username FROM OurAwesomeTablesForWebApp");
		
		echo'<select name = "username">';
		while($row = $result->fetch_row()){
			echo'<option>'.$row[0]."</option>";
		}
		
		echo'</select>';
		
		$result->close();

		$mysqli->close();
	?>

    <input type="submit" name="action" value="Delete User"> 
	
  </form>
	</body>
</html>