<?php
require '../includes/db_connect.php';
session_start();


// Fetch all unapproved products
try {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE approved = 0");
    $stmt->execute();
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
    $approve_id = $_POST['approve_id'];

    // Update product's approval status
    try {
        $stmt = $pdo->prepare("UPDATE products SET approved = 1 WHERE id = ?");
        $stmt->execute([$approve_id]);
        
        // Refresh the page to show updated product list
        header("Location: adminproduct_approve.php");
        exit();
    } catch (PDOException $e) {
        die("Error approving product: " . $e->getMessage());
    }
}

include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin Product Approval</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Pending Product Approvals</h2>
        
        <?php if (count($products) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($products as $product): ?>
                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-40 object-cover rounded mb-4">
                    <h3 class="text-xl font-semibold mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-gray-500 mb-2"><?= htmlspecialchars($product['description']) ?></p>
                    <div class="text-red-500 font-bold">Rs. <?= number_format($product['price'], 2) ?></div>
                    <div class="text-gray-600 text-sm mt-2">Available on: <?= htmlspecialchars($product['date']) ?>, <?= htmlspecialchars($product['time_interval']) ?></div>

                    <!-- Approve button -->
                    <form method="POST" action="adminproduct_approve.php" class="mt-4">
                        <input type="hidden" name="approve_id" value="<?= $product['id'] ?>">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Approve</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">No pending products for approval.</p>
        <?php endif; ?>
    </div>
</body>
</html>
