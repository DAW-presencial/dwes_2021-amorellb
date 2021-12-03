<?php
include_once "Estado.php";
include_once "Communication.php";

class Communicate extends Estado
{
  use Communication;

  function decirQueTal()
  {
    return "Qué tal? Soy Communicate";
  }
}