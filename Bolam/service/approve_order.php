<?php
require '../includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'vendor') {
    header("Location: ../login.php");
    exit();
}

$order_id = $_GET['id'] ?? null;

if ($order_id) {
    // Update the order status to approved
    $stmt = $pdo->prepare("UPDATE orders SET status = 'approved' WHERE id = ? AND service_provider_id = ?");
    $stmt->execute([$order_id, $_SESSION['user_id']]);
}

header("Location: service_dashboard.php"); // Redirect back to the service provider's dashboard

exit();
