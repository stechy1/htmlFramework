<?php

namespace stechy1\html\element\form\rule;



use stechy1\html\KeyPairValue;

class MinValueRule extends ARule {
    /**
     * MinValueRule constructor
     *
     * @param int $minValue Minimální povolené číslo
     */
    public function __construct($minValue) {
        parent::__construct('Minimální číslo je: ' . $minValue, $minValue);
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule($value) {
        return $value >= $this->rule;
    }

    function __toString() {
        return (new KeyPairValue('min', $this->rule))->__toString();
    }


}