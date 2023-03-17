<?php
class Pays
{
  public $id;
  public $code;
  public $name;
  public $color;

  public function __construct($id, $code, $name)
  {
    $this->id = $id;
    $this->code = $code;
    $this->name = $name;
  }

  public function stripedColor($index)
  {
    $color = $index % 4 == 0 || $index % 3 == 0  ? "#eaeaea" : "white";
    $this->setColor($color);
  }

  public function setColor($color)
  {
    return $this->color = $color;
  }
}
