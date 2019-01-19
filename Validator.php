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
   * @param string $value
   * @return $this
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }
  /**
  * is_numeric function
  * 
  * @return boolean
  */
  public function is_numeric() {
    return is_numeric($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é numérico';
  }
  /**
   * is_strings function
   *
   * @return boolean
   */
  public function is_string() {
    return is_string($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é uma string';
  }
  /**
   * is_number function
   *
   * @return boolean
   */
  public function is_number() {
    return is_number($this->value) ? $this : $this->error[] = 'Valor '.$this->name.' não é um numéro';
  }
  /**
   * range function
   *
   * @param [int] $len
   * @return void
   */
  public function ranger($len) {
    return strlen($this->value) >  $len ? $this->error[] = 'Valor '.$this->name.' é maior que p permitido' : $this;
  }
  /**
   * no_space function
   *
   * @return void
   */
  public function no_space() {
    return strstr($this->value, ' ') ? $this->error[] = 'Valor '.$this->name.' não pode conter espaços' : $this;
  }
  /**
   * getErrors function
   *
   * @return void
   */
  public function getErrors() {
    return $this->error;
  }
  /**
   * success function
   *
   * @return void
   */
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