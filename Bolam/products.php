<?php
require 'includes/db_connect.php';
include 'includes/navbar.php';

try {
    // Fetch all approved products
    $stmt = $pdo->prepare("SELECT * FROM products WHERE approved = 1");
    $stmt->execute();
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Products</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Featured Services</h2>
        
        <?php if (count($products) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($products as $product): ?>
                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                    <a href="view_service.php?id=<?= htmlspecialchars($product['id']) ?>">
                        <!-- Ensure the image path is correct by using 'uploads/' directly -->
                        <img src="uploads/<?= htmlspecialchars(basename($product['image'])) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-40 object-cover rounded mb-4">
                        <h3 class="text-xl font-semibold mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="text-gray-500 mb-2"><?= htmlspecialchars($product['description']) ?></p>
                        <div class="text-red-500 font-bold">Rs. <?= number_format($product['price'], 2) ?></div>
                        <div class="text-gray-600 text-sm mt-2">Available on: <?= htmlspecialchars($product['date']) ?>, <?= htmlspecialchars($product['time_interval']) ?></div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">No products available at the moment. Please check back later.</p>
        <?php endif; ?>
    </div>
</body>
</html>
