<?php
$query = $_GET['query'];
session_start();
$_SESSION['query'] = $query;

echo json_encode(['ok' => true]);
