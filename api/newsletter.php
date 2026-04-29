<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you would typically connect to a database and save the email
        // For Local WP environments, standard PHP works out of the box.
        // We simulate a successful database insert here.

        // sleep(1); // Simulate network/db delay (optional)

        echo json_encode(['status' => 'success', 'message' => 'Subscribed successfully.']);
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed.']);
}
?>
