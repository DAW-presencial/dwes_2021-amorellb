<?php
include_once "DbReader.php";
include_once "FileReader.php";

// https://diego.com.es/traits-en-php

$dbReader = DbReader::getInstance();
$fileReader = FileReader::getInstance();

var_dump($dbReader);
var_dump($fileReader);