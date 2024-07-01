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
if (!$row['admin']) {
  $responses = ['ok' => false, "errors" => [["input" => "pass", "errMess" => "Incorrect password or email"]]];
  echo json_encode($responses);
  return;
}
session_start();
$_SESSION['admin_name'] = $row['name'];
$_SESSION['admin_img_src'] = $row['img_src'];
$_SESSION['logged_admin'] = $row['user_id'];
echo json_encode(["ok" => true]);
