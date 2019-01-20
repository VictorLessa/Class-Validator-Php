<?php

namespace App\Validator;

class Validator
{
    /**
     * $name variable
     *
     * @var [string]
     */
    public $name;

    /**
     * $value variable
     *
     * @var [string/integer]
     */
    public $value;

    /**
     * $error variable
     *
     * @var array
     */
    public $error = [];

    /**
     * setName function
     *
     * @param [string] $name
     * @return void
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * setValue function
     *
     * @param [string/integer] $value
     * @return void
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
        return is_numeric($this->value) ? $this : array_push($this->error, array($this->name => 'O valor '.$this->value.' tem que ser numérico'));
    }

    /**
     * is_strings function
     *
     * @return boolean
     */
    public function is_string() {
        return is_string($this->value) ? $this : array_push($this->error, array($this->name => 'O valor '.$this->value.' não é uma string'));
    }

    /**
     * is_number function
     *
     * @return boolean
     */
    public function is_number() {
        return is_int($this->value) ? $this : array_push($this->error, array($this->name => $this->name.' não é um numero'));
    }

    /**
     * range function
     *
     * @param [int] $len
     * @return void
     */
    public function ranger($len) {
        return strlen($this->value) >  $len ? array_push($this->error, array($this->name => 'O valor '.$this->value.' é maior que o permitido')) : $this;
    }

    /**
     * no_space function
     *
     * @return void
     */
    public function no_space() {
        if (is_string($this->value)) {
            return strstr($this->value, ' ') ? array_push($this->error, array($this->name => 'O valor '.$this->value.' não pode conter espaço')) : $this;
        } else {
            return array_push($this->error, array($this->name => 'Para usar a função no_space o valor deve ser uma string'));
        }
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