<?

if($_GET['key']!="3587") {
	die("Access denied");
}

$sql = "INSERT INTO Users VALUES 
('alice', '".'$2y$10$rGSvwmvurEuoNgei6WSCCOs9A/WvXx0mwGGYrXIEJV4zlQo8vmGTq'."', 'admin', '20', '1257'), 
('bob', '".'$2y$10$HdGIIseolWHnE6/Zr5F8lOIAunKAvo.MXpXIxdLWuWHtTymDEPODW'."', 'normal', '15', '2165')";

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
$mysqli->query($sql);
$mysqli->close();

?>