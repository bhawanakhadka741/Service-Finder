<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sewahub";

$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
// Admin Panel Index File

include './include/user.php';
include './include/service.php';
?>
<!---------------------------------------- Landing page of the admin ---------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Tailwind css link -->

    <!-- Front-awesome link -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

</head>
<body>
    <!----------------------------------- Left Side Bar of Admin Panel -------------------------------------------->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fas fa-user-cog"></span>Admin Panel</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="./dashboard/dashboard.php?action=dashboard" class="active"><span class="fas fa-home"></span>
                    <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="./user_management/user_management.php?action=user_management"><span class="fas fa-user"></span>
                    <span>User Management</span></a>
                </li>

                <li>
                    <a href="./service_management/service_management.php?action=service_management"><span class="fas fa-tools"></span>
                    <span>Service Management</span></a>
                </li>

                <li>
                    <a href="./payment_management/payment_management.php?action=payment_management"><span class="fas fa-credit-card"></span>
                    <span>Payment Management</span></a>
                </li>

                <li>
                    <a href="./report/reports.php?action=reports"><span class="fas fa-chart-line"></span>
                    <span>Reports</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- ---------------------------------------------Main Content / Navbar------------------------------------- -->
    <div class="main-content">
        <header>
           <h2>
            <label for="">
                <span  class="fas fa-bars"></span>
            </label>
            Dashboard
           </h2>

           <div class="search-wrapper">
            <span class="fas fa-search"></span>
            <input type="search" placeholder="Search here" />
           </div>

           <div class="user-wrapper">
            <img src="../uploads/clean.jpeg" alt="Profic Pic" width="40px" height="40px">
            <div>
                <h4>Binita Kumari Mandal</h4>
                <small>Super Admin</small>
            </div>
           </div>
        </header>

        <!---------------------------------------------Hero Section-------------------------------------------  -->

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>99</h1>
                        <span>Customer</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>90</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="fas fa-clipboard"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>145</h1>
                        <span>Service</span>
                    </div>
                    <div>
                        <span class="fas fa-cogs"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>$9k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="fas fa-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Services</h3>
                            <button>See all <span class="fas fa-arrow-right"></span></button>

                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Service Title</td>
                                        <td>Department</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Electricians</td>
                                        <td>Home Services</td>
                                        <td>
                                            <span class="fa-solid fa-circle text-purple"></span>Available</td>
                                    </tr>

                                    <tr>
                                        <td>Beauty Service</td>
                                        <td>Personal Care Services</td>
                                        <td>
                                            <span class="fa-solid fa-circle text-purple"></span>Available</td>
                                    </tr>

                                    <tr>
                                        <td>AC/Fridge Repair</td>
                                        <td>Repair and Maintenance</td>
                                        <td>
                                            <span class="fa-solid fa-circle text-purple"></span>Available</td>
                                    </tr>

                                    <tr>
                                        <td>Photographers</td>
                                        <td>Event Service</td>
                                        <td>
                                            <span class="fa-solid fa-circle text-purple"></span>Available</td>
                                    </tr>

                                    <tr>
                                        <td>Home Tutors</td>
                                        <td>Education and Tutoring</td>
                                        <td>
                                            <span class="fa-solid fa-circle text-purple"></span>Available</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customers</h3>
                            <button>See all <span class="fas fa-arrow-right"></span></button>

                        </div>

                        <div class="card-body">
                            <div class="contact">
                                <img src="../uploads/clean.jpeg" width="40px" height="40px" alt="Customer pic">
                                <div>
                                    <h4>binita</h4>
                                    <small>ceo expect</small>
                                </div>
                            </div>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Tailwind js link -->
     <script src="../assets/js/script.js"></script>
</body>
</html>