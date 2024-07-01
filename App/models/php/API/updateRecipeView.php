<?php
$recipe = $_GET['name'];
$id = $_GET['id'];


require "../helpers/select.php";

require "../conn.php";
try {

  $result = $getRecord('views', '*', "WHERE recipe_id ='$id'");


  if ($result->num_rows !== 0) {

    $query = "UPDATE views SET views = views + 1 WHERE recipe_id = ? ";

    $stmt = $conn->prepare($query);

    $stmt->bind_param("s", $id);

    echo json_encode($stmt->execute() ? ['ok' => true] : ['ok' => false]);

    return;
  }

  $query = "INSERT INTO views VALUES(?,?,?)";

  $stmt = $conn->prepare($query);

  $view = 1;

  $stmt->bind_param("ssi", $id, $recipe, $view);

  echo json_encode($stmt->execute() ? ['ok' => true] : ['ok' => false]);
} catch (Exception $e) {
  echo json_encode(['error' => $e->getMessage()]);
}
