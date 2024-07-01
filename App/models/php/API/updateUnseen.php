<?php
$id = $_GET['id'];

require "../conn.php";
require "../helpers/select.php";

$comment = $getRecord('comments', '*', "WHERE id='$id'");
$row = $comment->fetch_assoc();
$messages = json_decode($row['messages'], true);
array_walk($messages, function (&$message) {
  $message['seen'] = true;
});

$updatedMessages = json_encode($messages);
$query = 'UPDATE comments set messages = ? where id = ?';
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $updatedMessages, $id);
echo $stmt->execute() ? json_encode(["ok" => true]) : json_encode(["ok" => false]);
