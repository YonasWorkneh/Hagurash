<?php
$id = $_GET['id'];

require "../conn.php";

$query = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE recipe_id = ?";

$stmt = $conn->prepare($query);

$stmt->bind_param("s", $id);

if (!$stmt->execute()) {
  echo json_encode(['ok' => false]);
}

$result = $stmt->get_result();

$rating = $result->fetch_assoc();


echo json_encode(['ok' => true, 'rating' => $rating['avg_rating']]);
