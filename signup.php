<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <?php include 'include/navbar.php'; ?>

    <!-- Employee Registration Form Section -->
    <section class="flex justify-center items-center min-h-screen">
        <?php include 'component/employeereg.php'; ?>
    </section>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</body>
</html>
