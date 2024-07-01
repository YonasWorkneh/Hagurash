<?php
require "../conn.php";
$removeRecord = function ($tableName, $condField, $value , $optionalCondition = '') use ($conn) {
  $query = "DELETE FROM $tableName WHERE $condField = '$value' $optionalCondition";
  $result = $conn->query($query);
  return $result;
};
