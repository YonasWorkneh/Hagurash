<?php
require "../helpers/select.php";

$result = $getRecord('users','*',"WHERE admin='0' AND bookmarked = '1'");

if (!$result) {
  echo json_encode(["status" => "failed"]);
}

$customers = [];

while ($row = $result->fetch_assoc()) {
  array_push($customers, $row);
}

echo json_encode(["status" => "success", "results" => $customers]);
