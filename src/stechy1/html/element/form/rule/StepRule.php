<?php

namespace stechy1\html\element\form\rule;


use stechy1\html\KeyPairValue;

class StepRule extends ARule {

    /**
     * StepRule constructor
     *
     * @param int $step Změna hodnoty
     */
    public function __construct($step) {
        parent::__construct('Povolený krok čísel je: ' . $step, $step);
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule($value) {
        return ($value % $this->rule) == 0;
    }

    function __toString() {
        return (new KeyPairValue('step', $this->rule))->__toString();
    }
}