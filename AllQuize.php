<?php

abstract class AllQuize implements query
{
    public $sdn = "mysql:host=localhost;dbname=quize";
    public $user = "root";
    public $pass = "";
    public $con;
  abstract public function Delete($id);
  abstract public function SelectAll();
  abstract public function __toString();

}