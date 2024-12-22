<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $date = date('Y-m-d');
  $status = 'In Progress';

  // Save to database (example query)
  // $query = "INSERT INTO reports (title, date, status) VALUES ('$title', '$date', '$status')";
  // mysqli_query($conn, $query);

  echo "Report generation started!";
}
?>

<h2>Generate New Report</h2>
<form method="POST">
  <label for="title">Report Title:</label>
  <input type="text" id="title" name="title" required><br><br>
  <button type="submit">Generate Report</button>
</form>
