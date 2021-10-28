<?php
class Coche {
  private $color;
  private $weight;
  private $engine;
  private $brand;
  private $model;

  public function __construct($color, $weight, $engine, $brand, $model) {
    $this->color = $color;
    $this->weight = $weight;
    $this->engine = $engine;
    $this->brand = $brand;
    $this->model = $model;
  }

  public function showParams() {
    echo "Color: $this->color; Peso: $this->weight; Motor: $this->engine; Marca: $this->brand; Modelo: $this->model";
  }
}