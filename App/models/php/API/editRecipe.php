<?php
$_POST = json_decode(file_get_contents("php://input"), true);
require "../helpers/userInfo.php";
$id = $_POST['id'];
$title = sanitize($_POST['title']);
$imgUrl = sanitize($_POST['img_url']);
$srcUrl = sanitize($_POST['src_url']);
$tit = ["title",$title];
$img = ["img_url",$imgUrl];
$src = ["source_url",$srcUrl];

if (empty($title) && empty($imgUrl) && empty($srcUrl)) {
  echo json_encode(["status" => "success", "message" => "Nothing specified"]);
  return;
}

$fields = [$tit,$img,$src];
$edited = [];
foreach($fields as $field){
  if(!empty($field[1]))
    array_push($edited,$field);
}

require "../conn.php";
$query = "UPDATE popular_recipes SET";
foreach($edited as $edit){
  $field = $edit[0];
  $value = $edit[1]; 
  $query.=" $field = '$value',";
}
$query = substr($query,0,-1);
$query .=" WHERE id = '$id'"; 

if($conn->query($query)){
  echo json_encode(["status"=>"success","item"=>"$title"]);
}
