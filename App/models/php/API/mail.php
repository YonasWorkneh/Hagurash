<?php

$request = json_decode(file_get_contents("php://input"), true);

$name = $request['name'] ?? '';
$email = $request['email'] ?? '';
$id = $request['id'];
$message = $request['message'] ?? '';


// Import the PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/autoload.php';
// Load Composer's autoloader

// config
require '../config.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = $hagurash['mail'];
  $mail->Password = 'jkfd unro wwkc tspl';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  //Recipients
  $mail->setFrom($hagurash['mail'], $hagurash['admin']);
  $mail->addAddress($email, $name);

  //Content
  $mail->isHTML(true);
  $mail->Subject = "reply to comment";
  $mail->Body = $message;
  
  $mail->send();

  // edit replies
  require "../conn.php";

  $timestamp = time() * 1000;
  $query = "INSERT INTO replies VALUES(?,?,?)";
  $stmt = $conn->prepare($query);

  $stmt->bind_param("ssi", $id, $message, $timestamp);

  $stmt->execute();

  // feedback client 
  echo json_encode(['ok' => true, "message" => $message]);
} catch (Exception $e) {

  // feedback error 

  echo json_encode(['ok' => false, 'error' => $e->getMessage().$e->getTrace()]);
}
