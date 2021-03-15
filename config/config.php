<?php

$dev_server = true;
define("LOCAL", true);
session_start();

if ($dev_server) {

    define("BA_DBHOST", "localhost");
    define("BA_DBUSER", "root");
    define("BA_DBPASSWORD", "");
    define("BA_DBNAME", "hotel_booking");
    define('BASE_URL', 'http://localhost/room_booking/');

    // DB connection
     $con = mysqli_connect(BA_DBHOST, BA_DBUSER, BA_DBPASSWORD, BA_DBNAME);

} 

// ADMIN
define("ADMIN_URL", BASE_URL . 'aPanel/');
define("ADMIN_ASSETS", ADMIN_URL . 'assets/');
define("ADMIN_CSS", ADMIN_ASSETS . 'css/');
define("ADMIN_JS", ADMIN_ASSETS . 'js/');
define("ADMIN_IMAGES", ADMIN_ASSETS . 'images/');
define("ADMIN_ICON", ADMIN_ASSETS . 'icon/');

// BOOKING
define("BOOKING_URL", ADMIN_URL . 'booking/');

// USER SCREEN ASSETS
define("ASSETS", BASE_URL . 'assets');
