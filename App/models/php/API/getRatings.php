<?php

require "../helpers/select.php";

$result = $getRecord('ratings', '*', "ORDER BY rating LIMIT 10");

if ($result->num_rows === 0) {
  echo json_encode(['ok' => false]);
  return;
}

$populars = [];

while ($row = $result->fetch_assoc()) {
  array_push($populars, ['rating' => $row['rating'], 'title' => $row['recipe_title']]);
}

echo json_encode(['ok' => true, 'results' => $populars]);
