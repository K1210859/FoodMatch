<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sname = "localhost";
$name = "root";
$password = "";
$db_name = "Food_Match";

$connection = mysqli_connect($sname, $name, $password, $db_name);

if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
else {
  echo "You have connected";
}

?>
