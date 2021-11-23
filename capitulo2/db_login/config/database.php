<?php

class Database
{
  private string $host = "localhost";
  private string $db_name = "php_db";
  private string $username = "php_db_user";
  private string $password = "PHPDBuser123!";
  public $conn;

  public function getConnection(): ?PDO
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
}