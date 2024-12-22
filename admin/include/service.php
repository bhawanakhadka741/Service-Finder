<?php
if (isset($_GET['action'])) {
  $action = $_GET['action'];

  if ($action == 'service_management') {
    include 'service_management.php';
  } elseif ($action == 'add_service') {
    include 'add_service.php';
  } elseif ($action == 'edit_service') {
    include 'edit_service.php';
  } elseif ($action == 'delete_service') {
    include 'delete_service.php';
  } else {
    echo "Invalid action!";
  }
}
?>
