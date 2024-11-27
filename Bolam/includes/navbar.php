<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>

<nav class="bg-gray-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="index.php" class="text-white text-2xl font-bold">Bolan</a>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="service_dashboard.php" class="text-white mr-4">Dashboard</a>
                <a href="products.php" class="text-white mr-4">Products</a>
                <a href="logout.php" class="text-white">Logout</a>
            <?php else: ?>
                <a href="login.php" class="text-white mr-4">Login</a>
                <a href="register.php" class="text-white">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
