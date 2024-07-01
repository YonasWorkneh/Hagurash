<?php
session_start();
unset($_SESSION['logged_admin']);

echo json_encode(['ok'=>true]);