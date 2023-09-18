<?php
if($_GET['key'] != "AbCd2468"){
    die("Acess denied");
}

$mysqli = new mysqli("localhost" , "sienasel_sbxusr" , "Sandbox@)!&" , "sienasel_sandbox");
$sql = "CREATE TABLE OurAwesomeTablesForWebApp (
    username VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    usertype VARCHAR(64) NOT NULL DEFAULT 'normal',
    games INT NOT NULL DEFAULT '0',
    points FLOAT NOT NULL DEFAULT '0.0',
    PRIMARY KEY (username)
)";

$mysqli->query($sql);
$mysqli->close();
?>
