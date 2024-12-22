http://Service-Finder/Bolam/admin/index.php?action=delete_user&id=1

<?php
$conn = new mysqli('localhost','root','','sewahub');

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<?php
// Delete User Page
$id = $_GET['id'];

// Here you would normally delete the user from the database
echo "<p>User with ID '$id' has been deleted successfully!</p>";
echo "<p><a href='index.php?action=user_management'>Back to User Management</a></p>";
?>
