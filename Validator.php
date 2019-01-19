<?php

namespace Valiadator;

class Validator
{
  public $name;
  public $value;
  public $error = [];

  public function setName($name) {
    $this->name = $name;
    return $this;
  }
  /**
   * @param $value
   * @return $this
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

  public function is_numeric() {
    return is_numeric($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é numérico';
  }

  public function is_string() {
    return is_string($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é uma string';
  }

  public function is_number() {
    return is_number($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é um numéro';
  }

  public function ranger($len) {
    return strlen($this->value) >  $len ? $this->error[] = 'Valor '.$this->name.' é maior que p permitido' : $this;
  }
  
  public function no_space() {
    return strstr($this->value, ' ') ? $this->error[] = 'Valor '.$this->name.' não pode conter espaços' : $this;
  }
  public function getErrors() {
    return $this->error;
  }

  public function success() {
    return !$this->getErrors() ? true : false;
  }
}

$validator = new Validator();

// $validator->setName('nome')->setValue('Victor')->is_numeric();
// $validator->setName('idade')->setValue('153')->is_numeric()->ranger(3);
// $validator->setName('nome')->setValue('2151')->is_string()->no_space();

// echo $validator->success();
// print_r($validator->getErrors());