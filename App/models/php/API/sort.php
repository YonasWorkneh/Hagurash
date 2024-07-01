<?php
require "../helpers/select.php";
$order = $_GET['sort'];

$condition = empty($order)?'':"ORDER BY $order";
$result = $getRecord('users','*',"WHERE admin = '0' $condition");

if (!$result) {
  echo json_encode(["status" => "failed"]);
}

$customers = [];

while ($row = $result->fetch_assoc()) {
  array_push($customers, $row);
}

echo json_encode(["status" => "success", "results" => $customers]);
