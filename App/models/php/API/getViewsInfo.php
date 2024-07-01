<?php

require "../helpers/select.php";

$result = $getRecord('views', '*', "ORDER BY views LIMIT 10");

if ($result->num_rows === 0) {
  echo json_encode(['ok' => false]);
  return;
}

$populars = [];

while ($row = $result->fetch_assoc()) {
  array_push($populars,['views' => $row['views'], 'title' => $row['recipe_title']]);
}

echo json_encode(['ok' => true, 'results' => $populars]);
