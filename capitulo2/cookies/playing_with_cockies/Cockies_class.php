<?php

class Cockies_class
{
  public $first_name;
  protected $last_name;
  private $age;

  public function __construct($first_name, $last_name, $age)
  {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->age = $age;
  }

  // Getting non existing or inaccessible properties
  public function __get($attr)
  {
    // Non existing properties
    if ($attr === 'user_age')
      return $this->age;
    if ($attr === 'user_lastname')
      return $this->last_name;

    // Inaccessible properties
    if ($attr === 'age')
      return $this->age;
    if ($attr === 'last_name')
      return $this->last_name;
  }

  // Setting protected and private properties
  public function __set($attr, $value)
  {
    if ($attr === 'age')
      $this->age = $value;
    if ($attr === 'last_name')
      $this->last_name = $value;
  }
}