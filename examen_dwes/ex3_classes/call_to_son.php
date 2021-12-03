<?php
include_once 'Son_class.php';

$obj = new Son_class('Bernat', 'Fiol', 23);
echo 'Propiedades inaccesibles: <br>';
echo $obj->first_name . '<br>';
echo $obj->last_name . '<br>';
echo $obj->age . '<br>';

echo '<br>';

echo 'Propiedades inexistentes: <br>';
$obj->user_name = 'Miquel';
echo $obj->user_name . '<br>';
$obj->user_lastname = 'Rosselló';
echo $obj->user_lastname . '<br>';
$obj->user_age = 46;
echo $obj->user_age . '<br>';