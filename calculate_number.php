<?php

$calculateNumber = new class
{
    const BASE = 10;
    /**
     * @var string
     */
    private $result = '';
    /**
     * @var string
     */
    private $carry = '';
    /**
     * @var string
     */
    private $showResult;

    /**
     * @param string $one
     * @param string $two
     */
    public function run(string $one, string $two)
    {
        $left = str_split($one);

        $right = str_split($two);

        $this->showResult = $this->sum($left, $right);
    }

    /**
     * @return string
     */
    public function showResult(): string
    {
        return $this->showResult;
    }

    /**
     * @param array $left
     * @param array $right
     * @return string
     */
    private function sum(array $left, array $right): string
    {
        if (0 === count($left) && 0 === count($right) && '0' === $this->carry) {
            return $this->result;
        }

        $leftChar = (int)array_pop($left);

        $rightChar = (int)array_pop($right);

        $sum = $leftChar + $rightChar + (int)$this->carry;

        $this->result = $sum % static::BASE . $this->result;

        $this->carry = (string)floor($sum / static::BASE);

        return $this->sum($left, $right);
    }
};

$calculateNumber->run('12312312312312312312', '1231219923499932992');

$calculateNumber->showResult();
