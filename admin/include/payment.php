<?php
if (isset($_GET['action'])) {
  $action = $_GET['action'];

  if ($action == 'payment_management') {
    include 'payment_management.php';
  } elseif ($action == 'add_payment') {
    include 'add_payment.php';
  } elseif ($action == 'edit_payment') {
    include 'edit_payment.php';
  } elseif ($action == 'delete_payment') {
    include 'delete_payment.php';
  } else {
    echo "Invalid action!";
  }
}
?>
