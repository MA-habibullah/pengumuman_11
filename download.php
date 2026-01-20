<?php
// MATIKAN SEMUA OUTPUT
error_reporting(0);
ini_set('display_errors', 0);
set_time_limit(0);

if (!isset($_GET['file'])) {
    http_response_code(404);
    exit('File tidak ditemukan');
}

$filename = basename($_GET['file']);
$filepath = __DIR__ . '/files/' . $filename;

if (!is_file($filepath) || !is_readable($filepath)) {
    http_response_code(404);
    exit('File tidak ada');
}

// Bersihkan buffer
while (ob_get_level()) {
    ob_end_clean();
}

// Header WAJIB
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . rawurlencode($filename) . '"');
header('Content-Length: ' . filesize($filepath));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: public');
header('Expires: 0');

// STREAM FILE (PALING AMAN UNTUK CLOUDFLARE)
$fp = fopen($filepath, 'rb');
fpassthru($fp);
fclose($fp);
exit;
