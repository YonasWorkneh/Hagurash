<?php
require "../helpers/select.php";

$comments = $getRecord('comments', '*');

if ($comments->num_rows === 0) {
  echo json_encode(['ok' => false]);
  return;
}

$chats = [];

while ($row = $comments->fetch_assoc()) {
  $messages = json_decode($row['messages'], true);
  array_walk($messages, function (&$message) use ($getRecord) {
    $id = $message['message_id'];
    $message['replies'] = [];
    $replies = $getRecord("replies", '*', "WHERE message_id='$id'");
    while ($reply = $replies->fetch_assoc()) {
      array_push($message['replies'], $reply);
    }
  });
  $row['messages'] = $messages;
  array_push($chats, $row);
}
echo json_encode(['ok' => true, "comments" => $chats]);
