<?php
// Check if 'action' is set in the URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Dynamically include the correct file based on the action
    if ($action == 'user_management') {
        include 'user_management.php';
    } elseif ($action == 'add_user') {
        include 'add_user.php';
    } elseif ($action == 'edit_user') {
        include 'edit_user.php';
    } elseif ($action == 'delete_user') {
        include 'delete_user.php';
    } else {
        echo "<h1>Invalid action specified!</h1>";
    }
} 

?>