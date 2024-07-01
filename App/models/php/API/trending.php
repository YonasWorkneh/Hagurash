<?php
require "../helpers/select.php";

$result = $getRecord('videos', '*', 'ORDER by num_views DESC LIMIT 6');
$videos = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    array_push($videos, [...array_filter($row, function ($_, $key) {
      return $key !== 'poster_url';
    }, ARRAY_FILTER_USE_BOTH), "poster" => $row['poster_url']]);
  }

  echo json_encode(['ok' => true, 'results' => $videos]);
  return;
}

echo json_encode(["ok" => false]);
