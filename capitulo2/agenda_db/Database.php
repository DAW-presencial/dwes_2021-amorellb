<?php

final class Database
{

  private static $conn;
  private const HOST = "localhost";
  private const DB_NAME = "schedule_db";
  private const USERNAME = "php_db_user";
  private const PASSWORD = "PHPDBuser123!";

  public static function getConnection(): PDO
  {
    if (null !== self::$conn) {
      return self::$conn;
    }
    try {
      self::$conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USERNAME, self::PASSWORD);
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }
    return self::$conn;
  }
}
