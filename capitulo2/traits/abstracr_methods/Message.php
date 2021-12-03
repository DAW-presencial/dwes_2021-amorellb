<?php

trait Message
{
  private $message;

  public function alert() {
    $this->define();
    echo $this->message;
  }

  abstract function define();
}