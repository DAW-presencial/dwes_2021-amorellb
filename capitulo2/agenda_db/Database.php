<?php

final class Database
{

  private static $conn;
  private const HOST = "localhost";
  private const DB_NAME = "amorell_db";
  private const USERNAME = "amorell_usr";
  private const PASSWORD = "abc123.";

  public static function getConnection(): PDO
  {
    if (null !== self::$conn) {
      return self::$conn;
    }
    try {
      self::$conn = new PDO("pgsql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USERNAME, self::PASSWORD);
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }
    return self::$conn;
  }
}
