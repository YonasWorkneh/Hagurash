<?php
$id = $_GET['id'];
$rating = +$_GET['rating'];
$recipe = $_GET['recipe'];

session_start();

$user = $_SESSION['logged_in'];

require "../helpers/select.php";

require "../conn.php";

$result = $getRecord('ratings', '*', "WHERE recipe_id = '$id' AND user_id = '$user'");

if ($result->num_rows !== 0) {
  $query = "UPDATE ratings SET rating = '$rating' WHERE user_id = '$user' AND recipe_id = '$id' ";
  echo json_encode($conn->query($query) ? ['ok' => true] : ['ok' => false]);
  return;
}

$query = "INSERT INTO ratings VALUES(?,?,?,?)";

$stmt = $conn->prepare($query);

$stmt->bind_param("sssi", $user, $id, $recipe, $rating);

echo json_encode($stmt->execute() ? ['ok' => true] : ['ok' => false]);
