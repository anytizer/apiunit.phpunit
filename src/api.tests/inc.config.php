<?php
/**
 * Log how the API is being used
 */
$file_contents = print_r(array_merge($_GET, $_POST, $_SERVER), true);
file_put_contents("logs.txt", $file_contents, FILE_APPEND);

/**
 * $_SERVER["REQUEST_METHOD"] == "POST"?
 * $_POST = json_decode(file_get_contents("php://input"), true);
 */

// [REQUEST_METHOD] => PUT
