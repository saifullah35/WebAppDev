<?php

 if($_GET['key'] != "AbCd2468"){
    die("Access denied");
} 

$sql = "INSERT INTO OurAwesomeTablesForWebApp VALUES
('alice', '".'$2y$10$eGRmr3dnl0vQx/tpdY7i1.b7TpW9330pWDLit8kBG7gRZ7fI0pSku'."','admin','20','1257'),
('bob', '".'$2y$10$eli8M.hNGF1UgU33GLNxgu.tpTDmNfXpQIVnAU5MAO9v2ONusFDOC'."','normal','15', '2165')";


$mysqli = new mysqli("localhost" , "sienasel_sbxusr" , "Sandbox@)!&" , "sienasel_sandbox");
$mysqli->query($sql);
$mysqli->close();



?>