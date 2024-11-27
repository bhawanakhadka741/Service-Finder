<?php
require '../includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'vendor') {
    header("Location: ../login.php");
    exit();
}

$service_provider_id = $_SESSION['user_id'];

// Fetch all pending and approved orders for the logged-in service provider
$stmt = $pdo->prepare("SELECT o.id, p.name AS product_name, o.date, o.time_slot, o.status, u.full_name AS user_name
                       FROM orders o
                       JOIN products p ON o.product_id = p.id
                       JOIN users u ON o.user_id = u.id
                       WHERE o.service_provider_id = ?");
$stmt->execute([$service_provider_id]);
$orders = $stmt->fetchAll();

include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Service Dashboard</title>
    <style>
        /* Tailwind CSS for internal styling */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        .btn-approve {
            @apply bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition-colors;
        }
        .btn-disabled {
            @apply bg-gray-300 text-white py-2 px-4 rounded cursor-not-allowed;
        }
        .table-header {
            @apply bg-gray-200 text-gray-600 text-center p-4 font-semibold;
        }
        .table-row {
            @apply text-center border-b;
        }
        .status-pending {
            @apply text-yellow-500 font-semibold;
        }
        .status-approved {
            @apply text-green-500 font-semibold;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Service Provider Dashboard</h2>

        <?php if (count($orders) > 0): ?>
            <table class="w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="table-header">Order ID</th>
                        <th class="table-header">Service</th>
                        <th class="table-header">Customer</th>
                        <th class="table-header">Date</th>
                        <th class="table-header">Time Slot</th>
                        <th class="table-header">Status</th>
                        <th class="table-header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr class="table-row">
                            <td class="p-4"><?= htmlspecialchars($order['id']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['product_name']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['user_name']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['date']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($order['time_slot']) ?></td>
                            <td class="p-4">
                                <?php if ($order['status'] === 'pending'): ?>
                                    <span class="status-pending">Pending</span>
                                <?php else: ?>
                                    <span class="status-approved">Approved</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4">
                                <?php if ($order['status'] === 'pending'): ?>
                                    <form action="approve_order.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                        <button type="submit" class="btn-approve">Approve</button>
                                    </form>
                                <?php else: ?>
                                    <button class="btn-disabled" disabled>Approved</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-gray-500">No orders available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
