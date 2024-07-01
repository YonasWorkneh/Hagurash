<?php
session_start();

unset($_SESSION['logged_in']);

setcookie("logged_in", " ", time() - 3600, '/');

echo json_encode(["ok" => true]);
