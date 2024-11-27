<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "error: not logged in";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $date = $_POST['date'];
    $time_slot = $_POST['time_slot'];

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, date, time_slot, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->execute([$user_id, $product_id, $date, $time_slot]);

    echo "success";
} else {
    echo "error: invalid request";
}
