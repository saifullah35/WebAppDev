<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<body>
		<form method="get" action="welcome.php">
<?php 	
if($_GET["action"] == null || $_GET["action"] == "Start Over") {
	echo '
		<label>Enter Your Name: <input type="text" name="username"></label>
		<input type="submit" name="action" value="Add Name">
	';
}
else if($_GET["action"] == "Add Name") {
	$_SESSION['username'] = $_GET['username'];
    echo '
		<h2>Welcome '.$_SESSION['username'].'</h2>
		<label>Enter Your Favorite Color: <input type="text" name="color"></label>
		<input type="submit" name="action" value="Add Color">
	';
}
else if($_GET["action"] == "Add Color") {
    $_SESSION['color'] = $_GET['color'];
	echo '
		<h2 style="color: '.$_SESSION["color"].'">Welcome '.$_SESSION['username'].'</h2>
        <label>Enter font-size: <input type="text" name="size"></label>
		<input type="submit" name="action" value="Add Size">
	';
}
else if($_GET["action"] == "Add Size") {
    $_SESSION['size'] = $_GET['size'];
    echo '
        <h2 style = "font-size: '.$_SESSION['size'].'px">Welcome '.$_SESSION['username'].'</h2>
        <input type="submit" name="action" value="Start Over">
        ';
}
$datastring = $_SESSION['username'].",".$_SESSION['color'].",".$_SESSION['size']."\n";
$filename = "welcomedata.txt";
$myfile = fopen($filename, "a");
fwrite($myfile, $datastring);
fclose($myfile);
?>
		</form>
	</body>
</html>