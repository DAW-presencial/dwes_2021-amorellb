<?php

trait Communication
{
  function sayHi() {
    return "Hi";
  }

  function decirQueTal() {
    return "Qué tal? Soy un trait";
  }

  function decirHolaQueTal() {
    return $this->sayHi() . " " . $this->decirQueTal();
  }

  function preguntarEstado() {
    return $this->sayHi() . " " . parent::decirQueTal();
  }

  function decirBien() {
    return "Bien, desde el Trait Communication";
  }
}