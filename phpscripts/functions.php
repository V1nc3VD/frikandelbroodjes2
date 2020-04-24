<?php 
function sanitize($raw_data) {
    global $conn;
    $data = mysqli_real_escape_string($conn, $raw_data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
?>