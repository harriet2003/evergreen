<?php
include 'connection.php';

header('Content-Type: application/json');  // Set the content type to JSON

$sql = "SELECT id FROM user_seedling ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($sql);
$latestSeedlingId = $result->fetch_assoc()['id'] ?? 0;

echo json_encode(['latestSeedlingId' => $latestSeedlingId]);
?>
