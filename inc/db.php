<?php
// Establish connection
$conn = mysqli_connect('localhost','root','','flipthescript');

// check connection
if(mysqli_connect_error()) {
  // Error
  echo "Connection to MySQL interrupted: ".mysqli_connect_error();
}
?>
