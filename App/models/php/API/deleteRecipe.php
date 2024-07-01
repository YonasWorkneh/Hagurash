<?php
$id = $_GET['id'];

require "../helpers/removeRecord.php";

$result = $removeRecord("popular_recipes",'id',$id);

if($result)
  echo json_encode(["status"=>"success","item"=>$id]);