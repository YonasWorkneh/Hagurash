<?php
require "../conn.php";
session_start();
$recipeId = $_GET['recipe'];
$userId = $_SESSION['logged_in'];

$query = "INSERT INTO bookmarks VALUES (?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $userId, $recipeId);

if ($stmt->execute()) {
  $query = "UPDATE users SET bookmarked = '1' WHERE user_id = '$userId'";
  if ($conn->query($query))
    echo json_encode(["status" => "success"]);
}

