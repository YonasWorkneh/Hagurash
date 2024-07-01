<?php
require "../helpers/select.php";
if (empty($_GET['search'])) {
  echo json_encode(["ok" => false, "message" => 'query not specified']);
  return;
}
$title = $_GET['search'];

$result = $getRecord('recipes','*',"WHERE title LIKE '%$title%'");
$response = ["status" => "success", "results" => $result->num_rows, "data" => array("recipes" => [])];
while ($row = $result->fetch_assoc()) {
  if (str_contains(strtolower($row['title']), strtolower($title))) {
    $row["ingredients"] = json_decode($row['ingredients']);
    array_push($response["data"]["recipes"], $row);
  }
}
echo json_encode($response);
