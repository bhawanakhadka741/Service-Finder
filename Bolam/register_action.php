<?php
require 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $citizenship_number = $_POST['citizenship_number'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Insert user data
    $stmt = $pdo->prepare("INSERT INTO users (full_name, username, age, address, email, phone, citizenship_number, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$full_name, $username, $age, $address, $email, $phone, $citizenship_number, $password, $role]);
    $user_id = $pdo->lastInsertId();

    // Handle document uploads
    if (isset($_FILES['documents'])) {
        foreach ($_FILES['documents']['tmp_name'] as $key => $tmp_name) {
            $file_path = 'uploads/' . basename($_FILES['documents']['name'][$key]);
            move_uploaded_file($tmp_name, $file_path);
            $stmt = $pdo->prepare("INSERT INTO documents (user_id, document_path) VALUES (?, ?)");
            $stmt->execute([$user_id, $file_path]);

        }
    }

    header("Location: login.php");
    exit();
}
?>


