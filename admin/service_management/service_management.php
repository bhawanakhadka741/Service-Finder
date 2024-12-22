<?php
// Sample data - replace with database query
$services = [
  ['id' => 1, 'title' => 'Electrician', 'department' => 'Home Services'],
  ['id' => 2, 'title' => 'Beauty Service', 'department' => 'Personal Care Services'],
  ['id' => 3, 'title' => 'AC/Fridge Repair', 'department' => 'Repair and Maintenance']
];
?>

<h2>Service Management</h2>
<a href="index.php?action=add_service" class="btn btn-primary">Add New Service</a>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Department</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($services as $service): ?>
      <tr>
        <td><?php echo $service['id']; ?></td>
        <td><?php echo $service['title']; ?></td>
        <td><?php echo $service['department']; ?></td>
        <td>
          <a href="index.php?action=edit_service&id=<?php echo $service['id']; ?>">Edit</a> |
          <a href="index.php?action=delete_service&id=<?php echo $service['id']; ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

