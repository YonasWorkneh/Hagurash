<?php
require "../helpers/select.php";

$id = substr($_SERVER['PATH_INFO'], 1);
$result = $getRecord('recipes','*',"WHERE id = '$id'");
$response = ["status" => "success", "data" => array("recipe" => [])];
while ($row = $result->fetch_assoc()) {
  $row["ingredients"] = json_decode($row['ingredients']);
  $response["data"]["recipe"] = $row;
}
if (!empty($response["data"]["recipe"]))
  echo json_encode($response);
