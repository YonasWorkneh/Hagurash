<?php
session_start();
$isActive = isset($_COOKIE['logged_in']) || isset($_SESSION['logged_in']);
$id = $_SESSION['logged_in'] ?? null; // can't use the cookie because users may have disagreed to cookies
if ($isActive) {
  require "../helpers/select.php";
  $result = $getRecord("users","status","where user_id='$id'");
  if ($result) {
    $row = $result->fetch_assoc();
    $status = $row['status'];
    echo json_encode(["loggedIn" => $isActive, "status" => +$status]);
  }
  return;
}
echo json_encode(["loggedIn" => $isActive]);
