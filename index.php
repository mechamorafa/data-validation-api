<?php

require_once 'src/Validator.php';

header("Content-Type: application/json");

// Check the request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}

// Get the sent data
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['type']) || !isset($input['value'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
    exit;
}

// Process the validation
$type = $input['type'];
$value = $input['value'];

try {
    $validator = new Validator();
    $result = $validator->validate($type, $value);

    echo json_encode(['success' => true, 'isValid' => $result]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

?>