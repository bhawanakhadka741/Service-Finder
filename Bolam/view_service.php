<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

require 'includes/db_connect.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: products.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ? AND approved = 1");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Product not found.";
    exit();
}

include 'includes/navbar.php';

// Generate the next 7 days for date selection
$dates = [];
for ($i = 0; $i < 7; $i++) {
    $dates[] = date('D, M j', strtotime("+$i day"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title><?= htmlspecialchars($product['name']) ?></title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .image-container {
            flex: 2;
        }
        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
        .booking-container {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .booking-container h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .booking-container .price {
            font-size: 20px;
            color: #e53e3e;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .booking-container .price-desc {
            background-color: #fef2f2;
            color: #e53e3e;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .date-selection, .time-slot-selection {
            margin-bottom: 15px;
        }
        .selection-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .button-group button {
            flex: 1 1 30%;
            padding: 10px;
            background-color: #f3f4f6;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .button-group button:hover {
            background-color: #f97316;
            color: #ffffff;
        }
        .button-group button.selected {
            background-color: #f97316;
            color: #ffffff;
            border-color: #f97316;
        }
        .book-now-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #f97316;
            color: #ffffff;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .book-now-btn:hover {
            background-color: #e5530a;
        }
    </style>
    <script>
        // Toggle selection for date and time buttons
        function toggleSelection(event, groupClass) {
            const buttons = document.querySelectorAll(groupClass);
            buttons.forEach(button => button.classList.remove('selected'));
            event.target.classList.add('selected');
        }
    </script>
</head>
<body>
    <div class="container">
        <nav style="margin-bottom: 20px;">
            <a href="products.php" style="color: #666;">Home</a> / <span>View Service</span>
        </nav>

        <div class="flex-container">
            <!-- Service Image and Description Section -->
            <div class="image-container">
                <img src="uploads/<?= htmlspecialchars(basename($product['image'])) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <h2 style="font-size: 30px; font-weight: bold; margin-top: 15px;"><?= htmlspecialchars($product['name']) ?></h2>
                <p style="color: #777; margin-bottom: 20px;">by <?= htmlspecialchars($product['provider'] ?? 'Service Provider') ?></p>
                <p><?= htmlspecialchars($product['description']) ?></p>
            </div>

            <!-- Booking Section -->
            <div class="booking-container">
                <h3>Book a Service</h3>
                <div class="price">Rs. <?= number_format($product['price'], 2) ?></div>
                <div class="price-desc">DHPPL-700, Corona-600, Rabies-300, Visit charge-300</div>

                <!-- Date Selection -->
                <div class="date-selection">
                    <span class="selection-label">Select Date</span>
                    <div class="button-group">
                        <?php foreach ($dates as $date): ?>
                            <button type="button" onclick="toggleSelection(event, '.date-selection .button-group button')"><?= $date ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Time Slot Selection -->
                <div class="time-slot-selection">
                    <span class="selection-label">Choose a time period</span>
                    <div class="button-group">
                        <?php 
                        $time_slots = ['8AM - 9AM', '9AM - 10AM', '10AM - 11AM', '11AM - 12PM', '12PM - 1PM', '1PM - 2PM', '2PM - 3PM', '3PM - 4PM', '4PM - 5PM'];
                        foreach ($time_slots as $slot): ?>
                            <button type="button" onclick="toggleSelection(event, '.time-slot-selection .button-group button')"><?= $slot ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Book Now Button -->
                <a href="order.php?id=<?= htmlspecialchars($product['id']) ?>" class="book-now-btn">Book Now</a>
            </div>
        </div>
    </div>
</body>
</html>
