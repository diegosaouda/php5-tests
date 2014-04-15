<?php

/**
 * Calculator - sample class to expose via JSON-RPC
 */
class Calculator
{
    /**
     * Return sum of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function add($x, $y)
    {
        return $x + $y;
    }

    /**
     * Return difference of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function subtract($x, $y)
    {
        return $x - $y;
    }

    /**
     * Return product of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function multiply($x, $y)
    {
        return $x * $y;
    }

    /**
     * Return the division of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return float
     */
    public function divide($x, $y)
    {
        return $x / $y;
    }

    /**
     * Retorna o fatorial
     *
     * @param int $value
     * @return int
     */
    public function fatorial($value)
    {
        $fat = 1;
        for ($i = 1; $i<=$value;$i++) {
            $fat *= $i;
        }
        return $fat;
    }

    /**
     * Retorna a potência de um número
     *
     * @param int $base
     * @param int $exp
     * @return int
     */
    public function potencia($base, $exp)
    {
        return pow($base, $exp);
    }
}
