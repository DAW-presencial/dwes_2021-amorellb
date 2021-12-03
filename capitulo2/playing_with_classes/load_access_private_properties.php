<?php
function access_private_properties_charger($Access_private_properties) {
  include $Access_private_properties. '.php';
}

spl_autoload_register('access_private_properties_charger');

$class_instance1 = new Access_private_properties('Bernat', 'Simon', 31);

// Reading non existing properties (__get)
echo 'The non existing surname is; ' . $class_instance1->user_lastname;
echo '<br>';
echo 'The non existing age is; ' .$class_instance1->user_age;
echo '<br>';
echo '<br>';

// Setting a value to inaccessible properties (__set)
$class_instance1->age = 27;
$class_instance1->last_name = 'Smith';
// Reading inaccessible properties (__get)
echo 'The inaccessible surname is; ' .$class_instance1->last_name;
echo '<br>';
echo 'The inaccessible age is; ' .$class_instance1->age;
