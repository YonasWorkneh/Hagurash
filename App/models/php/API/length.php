<?php
require "../helpers/select.php";

$table = $_GET['table'];

$result = $getRecord($table);

echo json_encode(["status" => "success", "length" => $result->num_rows]);
