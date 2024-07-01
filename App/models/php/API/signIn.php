<?php
$_POST = json_decode(file_get_contents("php://input"), true);
$responses;
$errors = [];

require "../helpers/userInfo.php";

empty($_POST['email']) && array_push($errors, ["input" => "email", "errMess" => "REQUIRED !"]);
empty($_POST['pass']) && array_push($errors, ["input" => "pass", "errMess" => "REQUIRED !"]);

if (count($errors)) {
  $responses = ['ok' => false, "errors" => [...$errors]];
  echo json_encode($responses);
  return;
}
$email = sanitize($_POST['email']);
$pass = sanitize($_POST['pass']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $responses = ['ok' => false, 'errors' => [["input" => "email", "errMess" => "Invalid email format !"]]];
  echo json_encode($responses);
  return;
}
$result  = alreadyExists($email);
if (!$result['exists']) {
  $responses = ['ok' => false, "errors" => [["input" => "email", "errMess" => "Incorrect email"]]];
  echo json_encode($responses);
  return;
}

$row = $result['result']->fetch_assoc();

if (!password_verify($pass, $row['password'])) {
  $responses = ['ok' => false, "errors" => [["input" => "pass", "errMess" => "Incorrect password"]]];
  echo json_encode($responses);
  return;
}

require "../conn.php";

$query = "UPDATE users SET updated_at = CURRENT_TIMESTAMP WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$row['user_id']);

if($stmt->execute()){
  session_start();
  $_SESSION['logged_in'] = $row['user_id'];
  require "../config.php";
  if (isset($_POST['remember']))
    setcookie("logged_in", $row['user_id'], $COOKIE_EXPIRATION_DATE, '/');
  echo json_encode(["ok" => true]);
}
