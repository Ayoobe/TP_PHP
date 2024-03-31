<?php


include ('connection.php');
$stmt = $conn->prepare("SELECT * FROM events LIMIT 3");

$stmt->execute();

$featured_events = $stmt->get_result();