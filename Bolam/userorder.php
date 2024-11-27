<?php
require 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch all orders for the logged-in user
$stmt = $pdo->prepare("SELECT o.id, p.name AS product_name, o.date, o.time_slot, o.status, u.full_name AS provider_name
                       FROM orders o
                       JOIN products p ON o.product_id = p.id
                       JOIN users u ON o.service_provider_id = u.id
                       WHERE o.user_id = ?");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();

include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Your Orders</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Your Orders</h2>
        
        <?php if (count($orders) > 0): ?>
            <table class="w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="p-4">Service</th>
                        <th class="p-4">Provider</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Time Slot</th>
                        <th class="p-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr class="text-center border-b">
                            <td class="p-4"><?= htmlspecialchars($order['product_name']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['provider_name']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['date']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['time_slot']) ?></td>
                            <td class="p-4"><?= ucfirst($order['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-gray-500">You have no orders yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
