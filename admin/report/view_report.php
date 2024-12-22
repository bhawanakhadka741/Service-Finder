<?php
// Fetch report details using ID (example data for testing)
$id = $_GET['id'];
$report = [
  'id' => $id,
  'title' => 'Monthly Income Report',
  'content' => 'This report shows the monthly income trends for December 2024. Total Income: $9,000.'
];
?>

<h2><?php echo $report['title']; ?></h2>
<p><?php echo $report['content']; ?></p>
<a href="index.php?action=reports" class="btn btn-secondary">Back to Reports</a>
