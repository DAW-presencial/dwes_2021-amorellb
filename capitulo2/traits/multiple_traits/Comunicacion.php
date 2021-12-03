<?php
include_once "Despedir.php";
include_once "Saludar.php";

class Comunicacion
{
  use Saludar, Despedir;
}