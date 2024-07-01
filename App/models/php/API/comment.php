<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['comment'];
$gender = $_POST['gender'] ?? '';
$subject = $_POST['subject'] ?? substr($message, 1, 20);
$sentAt = time() * 1000;
$unwantedChars = ['%', "'"," "];
$replacement = ['a'];
$id = str_replace($unwantedChars, $replacement, substr(str_shuffle($name . $email . time() . $subject), 0, 10));
// [{"seen": true, "message": "I am grateful for the amazing services your website is offering.", "sent_at": 1718447560000, "subject": "about expressing gratitude", "message_id": "0srykguhW5"}, {"seen": true, "message": "Why is your website frequently crashing these days I tried to upload a recipe but it would n't let me Can you help fix these issue?", "sent_at": 1718447717000, "subject": "about Hagurash's helpline", "message_id": "nYeiu1sdo@"}]
require "../conn.php";
require "../helpers/select.php";

$result = $getRecord('comments', 'messages', "WHERE email ='$email'");
if ($result->num_rows !== 0) {
  $query = "UPDATE comments SET messages = ?, last_active = ? WHERE email='$email'";
  $stmt = $conn->prepare($query);
  $messages = json_decode($result->fetch_assoc()['messages']);
  array_push($messages, ["message_id" => $id, "subject" => $subject, "message" => $message, 'seen' => false, "sent_at" => $sentAt]);
  $messages = json_encode($messages);
  $stmt->bind_param("si", $messages, $sentAt);
  echo $stmt->execute() ? json_encode(['ok' => true]) : json_encode(['ok' => false]);
  return;
}

$query = "INSERT INTO comments VALUES(?,?,?,?,?,?)";
$stmt = $conn->prepare($query);

$messages = json_encode([["message_id" => $id, "subject" => $subject, "message" => $message, 'seen' => false, "sent_at" => $sentAt]]);
$stmt->bind_param("sssssi", $id, $name, $gender, $email, $messages, $sentAt);


echo $stmt->execute() ? json_encode(['ok' => true]) : json_encode(['ok' => false]);
