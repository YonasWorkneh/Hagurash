<?php

require "../helpers/select.php";

$result = $getRecord("reviews",'*');

$response = ["ok" => true, "reviews" => []];

while ($row = $result->fetch_assoc()) {
  array_push($response["reviews"], ["id" => $row["id"], "name" => $row["name"], "imgUrl" => $row["img_url"], "review" => $row["review"], "title" => $row["title"]]);
}

echo json_encode($response);
