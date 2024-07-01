<?php

function register($name, $email, $pass)
{
  require "../conn.php";
  $regTime = time();
  $id = substr(str_shuffle($regTime . $name), 0, 12);
  $id = str_replace(' ', '', $id);
  $query = "INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES (?,?,?,?,false,0,false)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssss", $id, $name, $email, $pass);
  $stmt->execute();
}
function alreadyExists($email)
{
  require "../conn.php";
  $query = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  return ["result" => $result, "exists" => $result->num_rows];
}
function sanitize($input)
{
  return htmlspecialchars(stripslashes(trim($input)));
}
