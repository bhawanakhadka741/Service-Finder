<?php
// Sample data - replace with a database query
$payments = [
  ['id' => 1, 'customer' => 'John Doe', 'amount' => '1500', 'status' => 'Completed', 'date' => '2024-12-15'],
  ['id' => 2, 'customer' => 'Jane Smith', 'amount' => '2000', 'status' => 'Pending', 'date' => '2024-12-18'],
  ['id' => 3, 'customer' => 'Michael Lee', 'amount' => '3000', 'status' => 'Failed', 'date' => '2024-12-19']
];
?>

<h2>Payment Management</h2>
<a href="index.php?action=add_payment" class="btn btn-primary">Add New Payment</a>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <th>Amount</th>
      <th>Status</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($payments as $payment): ?>
      <tr>
        <td><?php echo $payment['id']; ?></td>
        <td><?php echo $payment['customer']; ?></td>
        <td><?php echo $payment['amount']; ?></td>
        <td><?php echo $payment['status']; ?></td>
        <td><?php echo $payment['date']; ?></td>
        <td>
          <a href="index.php?action=edit_payment&id=<?php echo $payment['id']; ?>">Edit</a> |
          <a href="index.php?action=delete_payment&id=<?php echo $payment['id']; ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
