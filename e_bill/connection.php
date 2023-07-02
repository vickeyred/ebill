<?php 

$dbhost="localhost";
$dbuser="root";
$dbpass="Vickey@100%";
$dbname="e_bill";
  
if(! $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
	die("failed to connect!");
}	
?>