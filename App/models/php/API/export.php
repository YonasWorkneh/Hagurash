<?php
require "../../../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection
require "../conn.php";

// SQL query
require "../helpers/select.php";
$result = $getRecord('users', '*', 'WHERE admin = 0');

// Get the selected output format from the form
$format = $_GET['format'] ?? 'csv';

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add the header row
$user = $result->fetch_assoc();
$header = array_filter(array_keys($user), function ($key) {
    return $key !== 'img_src';
});
$sheet->fromArray($header, null, 'A1');

// Add the data rows
$row = 2;
while ($user = $result->fetch_assoc()) {

    $user['reg_date'] = date('Y-m-d H:i:s', strtotime($user['reg_date']));
    $user['updated_at'] = date('Y-m-d H:i:s', strtotime($user['updated_at']));
    unset($user['img_src']);

    $sheet->fromArray(array_values($user), null, 'A' . $row);
    $row++;
}

// Set the file name based on the selected format
$fileName = "export." . $format;

// Output the file based on the selected format
switch ($format) {
    case 'csv':
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        $writer = new Csv($spreadsheet);
        $writer->save('php://output');
        break;
    case 'xls':
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        $writer = new Xls($spreadsheet);
        $writer->save('php://output');
        break;
    case 'xlsx':
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        break;
    default:
        echo json_encode("Invalid output format selected.");
        break;
}
