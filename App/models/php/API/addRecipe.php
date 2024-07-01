<?php
$_POST = json_decode(file_get_contents("php://input"), true);



require "../helpers/userInfo.php";

$title = sanitize($_POST['title']);
$imgUrl = sanitize($_POST['img_url']);
$srcUrl = sanitize($_POST['src_url']);
$id = str_shuffle(substr(time().$title,0,12));

require "../conn.php";

if (empty($title) && empty($imgUrl) && empty($srcUrl)) {
  echo json_encode(["status" => "success", "message" => "Nothing specified"]);
  return;
}

$query = "INSERT INTO popular_recipes VALUES (?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss",$id,$title,$srcUrl,$imgUrl);
$result = $stmt->execute();

if($result){
  echo json_encode(["status"=>"sucess"]);
}