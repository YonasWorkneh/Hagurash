<?php
require "../conn.php";

$getRecord = function ($tableName, $field = '*', $optional = '') use ($conn) {
  $query = "SELECT $field FROM $tableName $optional";
  $result = $conn->query($query);
  return $result;
};
