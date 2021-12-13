<?php

class Schedule
{

  private $conn;
  private string $table_name = "contacts";

  public string $username;
  public string $lastname;
  public int $phone;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  function writeContacts(): bool
  {
    $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, contact_number)
    VALUES (:username, :lastname, :phone)";

    // prepare the query
    $stmt = $this->conn->prepare($query);

    // bind the values
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':phone', $this->phone);

    // execute the query
    $stmt->execute();
    return true;
  }

  function updateContacts(): bool
  {
    $query = "UPDATE " . $this->table_name . " SET lastname = :lastname, contact_number = :phone
    WHERE firstname = :name";

    // prepare the query
    $stmt = $this->conn->prepare($query);

    // bind the values
    $stmt->bindParam(':name', $this->username);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':phone', $this->phone);

    // execute the query
    $stmt->execute();
    return true;
  }

  function deleteContact ($name): bool {

    $query = "DELETE FROM " . $this->table_name . " WHERE firstname = :name";

    // prepare the query
    $stmt = $this->conn->prepare($query);

    // bind the values
    $stmt->bindParam(':name', $name);

    // execute the query
    $stmt->execute();
    return true;
  }

  function readContacts()
  {
    $query = "SELECT * FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();

    return $data;
  }
}