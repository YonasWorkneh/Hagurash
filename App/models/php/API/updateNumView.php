<?php
require "../conn.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo json_encode(['ok' => false]);
  return;
}

$id = $_GET['id'];

$query = "UPDATE videos SET num_views = num_views + 1 WHERE id = '$id'";

if ($conn->query($query)) {
  echo json_encode(['ok' => true, "status" => 'sucess']);
  return;
}


