<?php
namespace CajitaArena;

class Money
{
    private $amount;

    public function __construct($amount)
    {
        if (is_numeric($amount)) {
            $this->amount = doubleval($amount);
        } else {
            throw new \Exception("Sólo se puede inicializar el dinero usando "
                . "un número como parámetro.", 10101);
        }
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function negate()
    {
        return new Money(-1 * $this->amount);
    }
}