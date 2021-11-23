<?php
// show error reporting
error_reporting(E_ALL);

// start php session
session_start();

// set your default time-zone
date_default_timezone_set('Asia/Manila');

// home page url
// $home_url="http://localhost/php-login-script-level-1/";
$home_url="/dwes_2021-amorellb/capitulo2/db_login/";

// page given in URL parameter, default page is one
$page = $_GET['page'] ?? 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;