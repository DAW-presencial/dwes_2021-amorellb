<?php
include_once "Message.php";

class Message_sender
{
  use Message;
  function define()
  {
    $this->message = "Esto es un mensaje";
  }
}