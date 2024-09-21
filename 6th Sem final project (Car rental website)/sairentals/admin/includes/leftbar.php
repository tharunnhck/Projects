<style>
    /* Basic reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Sidebar styles */
    .ts-sidebar {
        position: fixed;
        top: 60px; /* Adjusted to accommodate the existing header */
        left: 0;
        width: 240px;
        height: calc(100% - 60px); /* Adjusted to fit within the available height */
        background-color: #1f1f1f;
        color: #ccc;
        overflow-y: auto;
        transition: width 0.3s ease;
        z-index: 1000; /* Ensure sidebar stays above content */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
    }

    .ts-sidebar.collapsed {
        width: 80px; /* Collapsed width */
    }

    .ts-sidebar-menu {
        list-style-type: none;
        padding: 10px 0;
        margin: 0;
    }

    .ts-sidebar-menu li {
        padding: 10px 20px;
        border-bottom: 1px solid #333;
        transition: background-color 0.3s ease;
        white-space: nowrap; /* Prevent text wrapping */
        overflow: hidden; /* Hide overflowing text */
        text-overflow: ellipsis; /* Show ellipsis for overflow */
    }

    .ts-sidebar-menu li a {
        color: #ccc;
        text-decoration: none;
        display: block;
    }

    .ts-sidebar-menu li a i {
        margin-right: 10px;
    }

    .ts-sidebar-menu li a:hover {
        background-color: #2f2f2f;
        color: #fff;
    }

    .ts-label {
        color: #999;
        font-size: 12px;
        padding: 8px 20px;
    }
</style>


<nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
        <li class="ts-label">Main</li>
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        
        <li class="has-submenu">
            <a href="#"><i class="fas fa-tags"></i> Brands</a>
            <ul class="submenu">
                <li><a href="create-brand.php">Create Brand</a></li>
                <li><a href="manage-brands.php">Manage Brands</a></li>
            </ul>
        </li>

        <li class="has-submenu">
            <a href="#"><i class="fas fa-car"></i> Vehicles</a>
            <ul class="submenu">
                <li><a href="post-avehical.php">Post a Vehicle</a></li>
                <li><a href="manage-vehicles.php">Manage Vehicles</a></li>
            </ul>
        </li>

        <li class="has-submenu">
            <a href="#"><i class="fas fa-calendar-check"></i> Bookings</a>
            <ul class="submenu">
                <li><a href="all-bookings.php">All</a></li>
                <li><a href="new-bookings.php">New</a></li>
                <li><a href="confirmed-bookings.php">Confirmed</a></li>
                <li><a href="canceled-bookings.php">Canceled</a></li>
            </ul>
        </li>

        <li><a href="testimonials.php"><i class="fas fa-comments"></i> Manage Testimonials</a></li>
        <li><a href="manage-conactusquery.php"><i class="fas fa-envelope"></i> Manage Contact Us Query</a></li>
        <li><a href="reg-users.php"><i class="fas fa-users"></i> Registered Users</a></li>
        <li><a href="manage-pages.php">&nbsp<i class="fas fa-file-alt">&nbsp</i> Manage Pages</a></li>
        <li><a href="update-contactinfo.php"><i class="fas fa-address-card"></i> Update Contact Info</a></li>
        <li><a href="manage-subscribers.php"><i class="fas fa-user-friends"></i> Manage Subscribers</a></li>
        <li><a href="car-query.php"><i class="fas fa-car-side"></i> Car Booking Query</a></li>
        <li><a href="report.php">&nbsp<i class="fas fa-chart-bar"></i> Monthly Report</a></li>
    </ul>
</nav>