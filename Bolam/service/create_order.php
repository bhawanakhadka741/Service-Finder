<?php
require '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $title = $_POST['title'];
    $experience = $_POST['experience'];
    $hourly_rate = $_POST['hourly_rate'];
    $service_id = $_SESSION['user_id'];
    
    $image_path = '';
    if (!empty($_FILES['image']['name'])) {
        $image_path = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    $stmt = $pdo->prepare("INSERT INTO orders (title, experience, hourly_rate, service_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $experience, $hourly_rate, $service_id]);
    

    header("Location: service_dashboard.php");
    exit();
}
?>
