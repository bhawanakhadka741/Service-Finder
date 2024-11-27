<?php 
if (session_status() == PHP_SESSION_NONE) session_start(); 
?>

<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo / Branding -->
        <a href="service_dashboard.php" class="text-white text-2xl font-bold">Bolan Dashboard</a>
        
        <!-- Navigation Links -->
        <div class="flex space-x-6">
            <a href="service_dashboard.php" class="text-white hover:text-gray-400">Order Received</a>
            <a href="upload_product.php" class="text-white hover:text-gray-400">Create Service</a>
            <a href="../logout.php" class="text-white hover:text-gray-400">Logout</a>
        </div>
    </div>
</nav>
