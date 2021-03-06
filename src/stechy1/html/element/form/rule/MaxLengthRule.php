<?php

namespace stechy1\html\element\form\rule;


use stechy1\html\KeyPairValue;

/**
 * Class MaxLengthRule
 * @package stechy1\html\element\form\rule
 * Třída představuje pravidlo maximální délky vstupního řetězce.
 */
class MaxLengthRule extends ARule {

    private $maxLength;

    /**
     * RequiredRule constructor
     *
     * @param int $maxLength Maximální délka řetězce
     */
    public function __construct($maxLength) {
        parent::__construct('Maximální délka hodnoty je: ' . $maxLength, $maxLength);
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule($value) {
        return true;
    }

    function __toString() {
        return (new KeyPairValue('maxlength', $this->maxLength))->__toString();
    }
}