<?php
// Sample report data - Replace this with database queries
$reports = [
  ['id' => 1, 'title' => 'Monthly Income Report', 'date' => '2024-12-01', 'status' => 'Completed'],
  ['id' => 2, 'title' => 'Service Statistics', 'date' => '2024-12-05', 'status' => 'In Progress'],
  ['id' => 3, 'title' => 'User Activity Report', 'date' => '2024-12-10', 'status' => 'Completed'],
];
?>

<h2>Reports Management</h2>
<a href="index.php?action=generate_report" class="btn btn-primary">Generate New Report</a>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reports as $report): ?>
      <tr>
        <td><?php echo $report['id']; ?></td>
        <td><?php echo $report['title']; ?></td>
        <td><?php echo $report['date']; ?></td>
        <td><?php echo $report['status']; ?></td>
        <td>
          <a href="index.php?action=view_report&id=<?php echo $report['id']; ?>">View</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
