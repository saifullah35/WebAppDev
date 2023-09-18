<?php

$mysqli = new mysqli("localhost" , "sienasel_sbxusr" , "Sandbox@)!&" , "sienasel_sandbox");

$result = $mysqli->query("SHOW COLUMNS FROM OurAwesomeTablesForWebApp");

echo '<table>';
echo'<tr>';
while($row = $result->fetch_row()){
    echo'<th>'.$row[0]."</th>";
}
echo'<tr>';

$result->close();

$result = $mysqli->query("SELECT * FROM OurAwesomeTablesForWebApp");

while($row = $result->fetch_row()){
    echo'<tr>';
    foreach ($row as $value){
        echo '<td>'.$value.'</td>';
    }
    echo'<tr>';
}

echo '<table>';

$result->close();

$mysqli->close();
echo '<p><a href="logout.php">Logout</a></p>';

?>