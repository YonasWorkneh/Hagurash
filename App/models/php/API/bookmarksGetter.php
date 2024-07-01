<?php
require "../helpers/select.php";

session_start();

$id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : '';
$results = $getRecord('bookmarks', '*', "WHERE user_id = '$id'");
$response = ["status" => "success", "bookmarks" => []];
while ($row = $results->fetch_assoc()) {
  array_push($response['bookmarks'], $row['recipe_id']);
}

echo json_encode($response);
