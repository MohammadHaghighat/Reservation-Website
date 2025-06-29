<?php
session_start();

// turn off error reporting after project completion
/*
ini_set('display_errors', 'on');
error_reporting(E_ALL);
*/

// database information
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'reservation';
$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

/* check connection */
/*
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
*/
// for farsi data transfer to/from database
//$db->query("SET NAMES UTF8;");

// define our tables for usage in code

$db->durationsTable = "durations";
$db->loansTable = "loans";
$db->loan_reservationsTable = "loan_reservations";
$db->locationsTable = "locations";
$db->loc_reservationsTable = "loc_reservations";
$db->loc_reservelistTable = "loc_reservelist";
$db->menusTable = "menus";
$db->news = "news";
$db->pagesTable = "pages";
$db->settingTable = "setting";
$db->sliderTable = "slider";
$db->usersTable = "users";
$db->newsTable = "news";



$db->procatTable = "procat";
$db->productsTable = "products";
$db->ordersTable = "orders";
$db->commentsTable = "comments";

?>