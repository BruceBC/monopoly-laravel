<?php

namespace Database\traits;

trait Definable
{
  public function definition($file)
  {
    return include base_path("database/definitions/$file.php");
  }
}
