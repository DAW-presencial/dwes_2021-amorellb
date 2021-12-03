<?php

class Parent_class
{
  private $first_name;
  private $last_name;
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
    // Inaccessible properties
    if ($attr === 'first_name')
      return $this->first_name;
    if ($attr === 'last_name')
      return $this->last_name;
    if ($attr === 'age')
      return $this->age;

    // Non existing properties
    if ($attr === 'user_name')
      return $this->first_name;
    if ($attr === 'user_lastname')
      return $this->last_name;
    if ($attr === 'user_age')
      return $this->age;
  }

  // Setting protected and private properties
  public function __set($attr, $value)
  {
    if ($attr === 'first_name')
      $this->first_name = $value;
    if ($attr === 'last_name')
      $this->last_name = $value;
    if ($attr === 'age')
      $this->age = $value;
  }
}