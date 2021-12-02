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
    $query = 'insert into ' . $this->table_name . ' (firstname, lastname, contact_number)
    values (firstname = :username, lastname = :lastname, contact_number = :phone)';

    // prepare the query
    $stmt = $this->conn->prepare($query);

    // bind the values
    $stmt->bindParam(':firstname', $this->username);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':contact_number', $this->phone);

    // execute the query
    $stmt->execute();
    return true;
  }

  function readContacts()
  {
    $query = 'select * from ' . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $data = $stmt->fetchAll();

    return $data;
  }

  function deleteContact ($name): bool {

    $query = 'delete * from ' . $this->table_name . ' where firstname = :name';

    // prepare the query
    $stmt = $this->conn->prepare($query);

    // bind the values
    $stmt->bindParam(':name', $name);

    // execute the query
    $stmt->execute();
    return true;
  }
}