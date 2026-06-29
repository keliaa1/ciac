<?php
// CIAC Rwanda Native Router
// Handles Nginx try_files fallbacks seamlessly.

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Normalize the URI to handle trailing slashes
$normalized_uri = rtrim($uri, '/');

// If the root directory is requested, explicitly serve our static homepage.
if ($normalized_uri === '' || $normalized_uri === '/index.php' || $normalized_uri === '/index.html') {
    include __DIR__ . '/index.html';
    exit;
}

// If the server forwarded any other route here, it means the file wasn't found on disk.
// Serve the custom 404 template with the correct HTTP 404 header.
http_response_code(404);
include __DIR__ . '/404.html';
exit;
