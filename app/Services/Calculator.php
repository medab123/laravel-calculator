<?php

namespace App\Services;

class Calculator
{
    /**
     * @var int|mixed 
     */
    protected $result;

    /**
     * @param int|float $initialValue
     */
    public function __construct(int|float|null $initialValue = 0)
    {
        $this->result = $initialValue;
    }

    /**
     * @param $operation
     * @param $value
     * @return void
     */
    public function calculate($operation, $value)
    {
        switch ($operation) {
            case '+':
                $this->add($value);
                break;
            case '-':
                $this->subtract($value);
                break;
            case '*':
                $this->multiply($value);
                break;
            case '/':
                $this->divide($value);
                break;
            default:
                throw new \InvalidArgumentException('Invalid operation.');
        }
    }

    /**
     * @return int|mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $value
     * @return Calculator
     */
    protected function add($value): Calculator
    {
        $this->result += $value;
        return $this;
    }

    /**
     * @param $value
     * @return Calculator
     */
    protected function subtract($value): Calculator
    {
        $this->result -= $value;
        return $this;
    }

    /**
     * @param $value
     * @return Calculator
     */
    protected function multiply($value): Calculator
    {
        $this->result *= $value;
        return $this;
    }

    /**
     * @param $value
     * @return Calculator
     */
    protected function divide($value): Calculator
    {
        if ($value == 0) {
            throw new \InvalidArgumentException('Division by zero.');
        }

        $this->result /= $value;
        return $this;
    }
}