<?php
$key = $_GET['search'];

require "../helpers/select.php";

$result = $getRecord('users','*',"WHERE admin = '0' AND (user_id LIKE '%$key%' OR name LIKE '%$key%')");

if ($result->num_rows === 0) {
  echo json_encode(["status" => "failed", "message" => "There is no user by the given key"]);
}

$users = [];
while ($row = $result->fetch_assoc()) {
  array_push($users, $row);
}
echo json_encode(["status" => "success", "results" => $users]);
