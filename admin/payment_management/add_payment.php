<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect form data
  $customer = $_POST['customer'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  // Save to database (example query)
  // $query = "INSERT INTO payments (customer, amount, status) VALUES ('$customer', '$amount', '$status')";
  // mysqli_query($conn, $query);

  echo "Payment record added successfully!";
}
?>

<h2>Add New Payment</h2>
<form method="POST">
  <label for="customer">Customer Name:</label>
  <input type="text" id="customer" name="customer" required><br><br>

  <label for="amount">Amount:</label>
  <input type="number" id="amount" name="amount" required><br><br>

  <label for="status">Status:</label>
  <select id="status" name="status">
    <option value="Completed">Completed</option>
    <option value="Pending">Pending</option>
    <option value="Failed">Failed</option>
  </select><br><br>

  <button type="submit">Add Payment</button>
</form>
