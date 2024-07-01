<?php
require "../helpers/removeRecord.php";

session_start();

$userId = $_SESSION['logged_in'];

$recipeId = $_GET['recipe'];

$deleted = $removeRecord('bookmarks', 'recipe_id', $recipeId, "AND user_id = '$userId'");

if ($deleted)
  echo json_encode(["status" => "success", "message" => "$recipeId,$userId is successfully deleted from bookmarks"]);
