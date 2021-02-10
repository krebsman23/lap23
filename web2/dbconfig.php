<?php
//Datenbankzugang in
$servername = "localhost";
$dbusername = "root";
$dbpwd = "";
$dbname = "web2";

$db = new mysqli($servername, $dbusername, $dbpwd, $dbname);
if($db->connect_error){
  die ("Datenbankverbindung konnte nicht aufgebaut werden!". $db->connect_error);
}
