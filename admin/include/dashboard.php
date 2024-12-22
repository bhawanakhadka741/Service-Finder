<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'dashboard') {
        // Code for the dashboard
        echo "<h1>Welcome to the Dashboard</h1>";
    } elseif ($action == 'recent_services') {
        // Code for recent services
        echo "<h1>Recent Services</h1>";
    } elseif ($action == 'new_customers') {
        // Code for new customers
        echo "<h1>New Customers</h1>";
    } else {
        echo "Invalid action!";
    }
} else {
    echo "No action specified!";
}
?>