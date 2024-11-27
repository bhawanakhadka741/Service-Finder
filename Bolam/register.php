<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>User and Service Registration</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <form action="register_action.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Register</h2>
        <input type="text" name="full_name" placeholder="Full Name" class="w-full p-2 mb-4 border" required>
        <input type="text" name="username" placeholder="Username" class="w-full p-2 mb-4 border" required>
        <input type="number" name="age" placeholder="Age" class="w-full p-2 mb-4 border">
        <input type="text" name="address" placeholder="Address" class="w-full p-2 mb-4 border">
        <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-4 border" required>
        <input type="text" name="phone" placeholder="Phone Number" class="w-full p-2 mb-4 border">
        <input type="text" name="citizenship_number" placeholder="Citizenship Number" class="w-full p-2 mb-4 border">
        <label for="documents" class="block mb-2">Upload Documents:</label>
        <input type="file" name="documents[]" multiple class="w-full mb-4 p-2 border">
        <select name="role" class="w-full p-2 mb-4 border">
            <option value="user">User</option>
            <option value="vendor">Service Provider</option>
        </select>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</button>
    </form>
</body>
</html>


