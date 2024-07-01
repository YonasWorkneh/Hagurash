<?php
require "../helpers/select.php";

$result = $getRecord("popular_Recipes");
if ($result->num_rows == 0)
  return;

$response = ["ok" => true, "popularRecipes" => []];
while ($row = $result->fetch_assoc()) {
  array_push($response["popularRecipes"], ["id" => $row['id'], "title" => $row["title"], "srcUrl" => $row["source_url"], "imgUrl" => $row["img_url"]]);
}

echo json_encode($response);
