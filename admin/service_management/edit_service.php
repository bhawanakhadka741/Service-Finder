<?php
// Fetch service details (example)
$id = $_GET['id'];
// Example data, replace with database query
$service = ['id' => $id, 'title' => 'Electrician', 'department' => 'Home Services'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect updated data
  $title = $_POST['title'];
  $department = $_POST['department'];

  // Update database (example query)
  // $query = "UPDATE services SET title='$title', department='$department' WHERE id='$id'";
  // mysqli_query($conn, $query);

  echo "Service updated successfully!";
}
?>

<h2>Edit Service</h2>
<form method="POST">
  <label for="title">Service Title:</label>
  <input type="text" id="title" name="title" value="<?php echo $service['title']; ?>" required><br><br>

  <label for="department">Department:</label>
  <input type="text" id="department" name="department" value="<?php echo $service['department']; ?>" required><br><br>

  <button type="submit">Update Service</button>
</form>
