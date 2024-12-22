http://Service-Finder/Bolam/admin/index.php?action=edit_user&id=1

<?php
$conn = new mysqli('localhost','root','','sewahub');

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<?php
// Edit User Page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Here you would normally update the user in the database
    echo "<p>User ID '$id' updated to Name: '$name', Email: '$email'!</p>";
    echo "<p><a href='index.php?action=user_management'>Back to User Management</a></p>";
} else {
    $id = $_GET['id'];
    // Dummy user data for editing
    $user = ['id' => $id, 'name' => 'Example User', 'email' => 'example@example.com'];

    echo "<h1>Edit User</h1>";
    echo "<form method='POST'>
        <label for='name'>Name:</label>
        <input type='text' id='name' name='name' value='{$user['name']}' required><br>
        <label for='email'>Email:</label>
        <input type='email' id='email' name='email' value='{$user['email']}' required><br>
        <button type='submit'>Update User</button>
    </form>";
}
?>
