<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <form action="login_action.php" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-4 border" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
    </form>
</body>
</html>


