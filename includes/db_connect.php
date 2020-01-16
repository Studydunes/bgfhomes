<?php
global $con;
$dbname = "bgfhomes_internet_banking_system";      // DB Name //cyc_db
$username = "root";    // DB Benutzer//cyc_user123
$password = "soarlogic";	// DB Passwort//cyc_user123
$servername = "127.0.0.1"; // DB Server

define('DB_USER', $username);
define('DB_PASSWORD', $password);
define('DB_NAME', $dbname);
define('DB_HOST', $servername);
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

define("ACCOUNT_TYPE", "account_type");
define('ADD_BENEFICIARY', "add_beneficiary");
define("ADMIN", "admin");
define("AUTHOR", "author");
define('BANKS', "banks");
define('BANKS_DETAIL', "banks_detail");
define("BENEFICIARY", "beneficiary");
define("CATEGORY", "category");
define("CITY", "city");
define("COUNTRY", "country");
define("CURRENCY","currency");
define("DEPARTMENT","department");
define("FAQ","faq");
define("GENDER","gender");
define("MARITAL","marital");
define("ROLE","role");
define("SALUTATION","salutation");
define("SALUTIONS","salutions");
define("SKILL","skill");
define("STATE","state");
define("STATUS","status");
define("TRANSACTION", "transaction");
define('TRANSFER_LIMIT', "transfer_limit");
define("TYPE", "type");
define("USER", "user");

?>