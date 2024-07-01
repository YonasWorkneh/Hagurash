<?php
$_POST = json_decode(file_get_contents("php://input"), true);

require "../helpers/userInfo.php";

$responses;
$errors = [];
empty($_POST['name']) && array_push($errors, ["input" => "name", "errMess" => "REQUIRED!"]);
$name = sanitize($_POST['name']);
empty($_POST['email']) && array_push($errors, ["input" => "email", "errMess" => "REQUIRED!"]);
$email = sanitize($_POST['email']);
empty($_POST['pass']) && array_push($errors, ["input" => "pass", "errMess" => "REQUIRED!"]);
$pass = sanitize($_POST['pass']);
if (!count($errors)) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $responses = ["ok" => false, "errors" => [["input" => "email", "errMess" => "Invalid email format!"]]];
    echo json_encode($responses);
    return;
  }
  if (alreadyExists($email)['exists']) {
    $responses = ["ok" => false, "errors" => [["input" => "email", "errMess" => "User already exists!"]]];
  } else {
    $pass = password_hash($pass,PASSWORD_DEFAULT);
    register($name, $email, $pass);
    $responses = ["ok" => true, "message" => "No error found!", "data" => ["name" => $name, "email" => $email, "pass" => $pass]];
  }
} else
  $responses = ["ok" => false, "errors" => [...$errors]];
echo json_encode($responses);
