<?php
// Fetch payment details (example)
$id = $_GET['id'];
// Example data, replace with a database query
$payment = ['id' => $id, 'customer' => 'John Doe', 'amount' => '1500', 'status' => 'Completed'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect updated data
  $customer = $_POST['customer'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  // Update database (example query)
  // $query = "UPDATE payments SET customer='$customer', amount='$amount', status='$status' WHERE id='$id'";
  // mysqli_query($conn, $query);

  echo "Payment record updated successfully!";
}
?>

<h2>Edit Payment</h2>
<form method="POST">
  <label for="customer">Customer Name:</label>
  <input type="text" id="customer" name="customer" value="<?php echo $payment['customer']; ?>" required><br><br>

  <label for="amount">Amount:</label>
  <input type="number" id="amount" name="amount" value="<?php echo $payment['amount']; ?>" required><br><br>

  <label for="status">Status:</label>
  <select id="status" name="status">
    <option value="Completed" <?php if ($payment['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
    <option value="Pending" <?php if ($payment['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
    <option value="Failed" <?php if ($payment['status'] == 'Failed') echo 'selected'; ?>>Failed</option>
  </select><br><br>

  <button type="submit">Update Payment</button>
</form>
