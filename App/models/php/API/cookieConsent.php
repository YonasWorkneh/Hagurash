<?php
require "../config.php";
$consent = json_decode(file_get_contents("php://input"));

setcookie("cookie_consent", $consent->consent, $COOKIE_EXPIRATION_DATE, '/');

echo json_encode(["ok" => true, "message" => "cookie consent set properly"]);
