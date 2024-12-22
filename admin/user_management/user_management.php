<?php
$conn = new mysqli('localhost','root','','sewahub');

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<?php
// User Management Page
echo "<h1>User Management</h1>";
echo "<p>Manage all registered users here.</p>";

// Dummy data for users
$users = [
    ['id' => 1, 'name' => 'Binita Kumari Mandal', 'email' => 'binita@example.com'],
    ['id' => 2, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 3, 'name' => 'Jane Smith', 'email' => 'jane@example.com']
];

// Display the users in a table
echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>";

foreach ($users as $user) {
    echo "<tr>
        <td>{$user['id']}</td>
        <td>{$user['name']}</td>
        <td>{$user['email']}</td>
        <td>
            <a href='index.php?action=edit_user&id={$user['id']}'>Edit</a> |
            <a href='index.php?action=delete_user&id={$user['id']}'>Delete</a>
        </td>
    </tr>";
}

echo "</table>";

// Link to add a new user
echo "<p><a href='index.php?action=add_user'>Add New User</a></p>";
?>
