<?php
if (!isset($_GET['file'])) {
    http_response_code(404);
    exit('File tidak ditemukan');
}

$filename = trim(basename($_GET['file'])); // keamanan
$filepath = __DIR__ . "/files/" . $filename; // ✅ FIX DI SINI

if (!file_exists($filepath)) {
    http_response_code(404);
    exit('File tidak ditemukan');
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime  = finfo_file($finfo, $filepath);
finfo_close($finfo);

header("Content-Type: $mime");
header("Content-Disposition: inline; filename=\"$filename\"");
header("Content-Length: " . filesize($filepath));
header("Accept-Ranges: bytes");

readfile($filepath);
exit;
