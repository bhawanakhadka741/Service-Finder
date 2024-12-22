<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect form data
  $title = $_POST['title'];
  $department = $_POST['department'];

  // Save to database (example query)
  // $query = "INSERT INTO services (title, department) VALUES ('$title', '$department')";
  // mysqli_query($conn, $query);

  echo "Service added successfully!";
}
?>

<h2>Add New Service</h2>
<form method="POST">
  <label for="title">Service Title:</label>
  <input type="text" id="title" name="title" required><br><br>

  <label for="department">Department:</label>
  <input type="text" id="department" name="department" required><br><br>

  <button type="submit">Add Service</button>
</form>
