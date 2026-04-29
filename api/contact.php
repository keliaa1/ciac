<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Validate inputs
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
        
        // In a real application, you might use mail() or store it in the database.
        // Example: mail('info@ciac.rw', "New Inquiry: $subject", "From: $name ($email)\n\n$message");

        // Simulate save
        echo json_encode(['status' => 'success', 'message' => 'Inquiry sent successfully.']);
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Please fill out all required fields correctly.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed.']);
}
?>
