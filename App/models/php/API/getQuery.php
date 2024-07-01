<?php
session_start();
if (!isset($_SESSION['query'])) {
    echo json_encode(['ok' => false]);
    return;
}
echo json_encode(['ok' => true, 'query' => $_SESSION['query']]);
