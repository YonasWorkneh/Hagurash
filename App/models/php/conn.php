<?php

require "config.php";
$conn = new mysqli($HOST, $USER, $PASS, $DATABASE);

if ($conn->connect_error) {
  die("Connection Failed:" . $conn->connect_error);
}
