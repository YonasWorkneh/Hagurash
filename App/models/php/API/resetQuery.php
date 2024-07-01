<?php
session_start();

unset($_SESSION['query']);
echo json_encode(["status" => "successful", "status_code" => 200, "message" => "query reset successfully"]);
