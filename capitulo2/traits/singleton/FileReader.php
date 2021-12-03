<?php
include_once "Singleton.php";

class FileReader extends SplFileObject
{
  use Singleton;
}