<?php
if (isset($_GET['action'])) {
  $action = $_GET['action'];

  if ($action == 'reports') {
    include 'reports.php';
  } elseif ($action == 'view_report') {
    include 'view_report.php';
  } elseif ($action == 'generate_report') {
    include 'generate_report.php';
  } else {
    echo "Invalid action!";
  }
}
?>
