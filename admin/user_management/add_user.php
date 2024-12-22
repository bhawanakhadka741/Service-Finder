http://Service-Finder/Bolam/admin/index.php?action=add_user

<?php
$conn = new mysqli('localhost','root','','sewahub');

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<?php
// Add User Page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Here you would normally add the user to the database
    echo "<p>User '$name' with email '$email' added successfully!</p>";
    echo "<p><a href='index.php?action=user_management'>Back to User Management</a></p>";
} else {
    echo "<h1>Add New User</h1>";
    echo "<form method='POST'>
        <label for='name'>Name:</label>
        <input type='text' id='name' name='name' required><br>
        <label for='email'>Email:</label>
        <input type='email' id='email' name='email' required><br>
        <button type='submit'>Add User</button>
    </form>";
}
?>
