<?php
require '../includes/db_connect.php';
session_start();

// Check if the user is a service provider
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'vendor') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time_interval = $_POST['time_interval'];
    $user_id = $_SESSION['user_id'];
    
    // Handle image upload
    $image_path = '';
    if (!empty($_FILES['image']['name'])) {
        $image_path = '../uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    // Insert into products table
    $stmt = $pdo->prepare("INSERT INTO products (name, price, description, date, time_interval, image, approved, user_id) VALUES (?, ?, ?, ?, ?, ?, 0, ?)");
    $stmt->execute([$name, $price, $description, $date, $time_interval, $image_path, $user_id]);

    header("Location: service_dashboard.php");
    exit();
}

include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Upload Product</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Upload a New Product</h2>
        
        <form action="upload_product.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            <input type="text" name="name" placeholder="Product Name" class="w-full p-2 mb-4 border" required>
            <input type="number" step="0.01" name="price" placeholder="Price" class="w-full p-2 mb-4 border" required>
            <textarea name="description" placeholder="Description" class="w-full p-2 mb-4 border" required></textarea>
            <input type="date" name="date" class="w-full p-2 mb-4 border" required>
            <input type="text" name="time_interval" placeholder="Time Interval (e.g., 8AM - 9AM)" class="w-full p-2 mb-4 border" required>
            <input type="file" name="image" class="w-full p-2 mb-4 border" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload Product</button>
        </form>
    </div>
</body>
</html>
