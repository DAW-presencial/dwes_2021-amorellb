<?php
function cockie_charger($Cockies_class) {
  include $Cockies_class. '.php';
}

spl_autoload_register('cockie_charger');

$cockie1 = new Cockies_class('Bernat', 'Simon', 31);

// Reading non existing properties (__get)
echo 'The non existing surname is; ' . $cockie1->user_lastname;
echo '<br>';
echo 'The non existing age is; ' .$cockie1->user_age;
echo '<br>';
echo '<br>';

// Setting a value to inaccessible properties (__set)
$cockie1->age = 27;
$cockie1->last_name = 'Smith';
// Reading inaccessible properties (__get)
echo 'The inaccessible surname is; ' .$cockie1->last_name;
echo '<br>';
echo 'The inaccessible age is; ' .$cockie1->age;
