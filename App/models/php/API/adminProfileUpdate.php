<?php
require "../helpers/userInfo.php";
session_start();

$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$img = null;
$unique = str_shuffle(substr(time(), 0, 4));

if (empty($name) && empty($email) && empty($pass) && $_FILES['admin_img']["error"] === UPLOAD_ERR_NO_FILE) {
  echo json_encode(["status" => "success", "message" => "Nothing Edited"]);
  return;
}

$fields = [["name", $name], ["email", $email], ["password", $pass]];
$edited = [];

foreach ($fields as $field) {
  if (!empty($field[1]))
    array_push($edited, $field);
}
$imgUploaded = $_FILES['admin_img']["error"] === UPLOAD_ERR_OK;
if ($imgUploaded) {
  $img = $_FILES['admin_img']["tmp_name"];
  array_push($edited, ["img_src", $img]);
}

$query = "UPDATE users SET ";
$queryValues = [];
foreach ($edited as $edit) {
  $field = $edit[0];
  $value = $edit[1];
  if ($field === 'img_src') {
    move_uploaded_file($value, "../../../../assets/images/admin$unique.png");
    $queryValues[] = "img_src = '/hagurash/assets/images/admin$unique.png'";
  } else {
    $queryValues[] = "$field = '$value'";
  }
}
array_walk($edited, function ($edit) use ($unique) {
  if ($edit[0] === 'name')
    $_SESSION['admin_name'] = $edit[1];
  if ($edit[0] === 'img_src')
    $_SESSION['admin_img_src'] = "../../../assets/images/admin$unique.png";
});

$query .= implode(', ', $queryValues);
$query .= " WHERE admin = '1'";

require "../conn.php";
if (!$conn->query($query)) {
  echo json_encode(["error" => "Error updating user information"]);
  return;
}

$result = [
  "ok" => true,
  "result" => [
    "name" => $name,
    "email" => $email,
    "imgSrc" => $imgUploaded ? "/hagurash/assets/images/admin$unique.png" : ""
  ]
];
echo json_encode($result);
