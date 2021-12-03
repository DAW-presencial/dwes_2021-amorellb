<?php
include_once "Singleton.php";

class DbReader extends Mysqli
{
  use Singleton;
}