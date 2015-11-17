<?php

namespace stechy1\html\element\form\rule;


abstract class ARule {

    protected $rule;
    protected $errorMessage;

    /**
     * ARule constructor
     *
     * @param $errorMessage string Chybová zpráva při nesplnění pravidla
     * @param $rule string Samotné znění pravidla
     */
    public function __construct($errorMessage, $rule = null) {
        $this->rule = $rule;
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * Vrátí chybovou zprávu pravidla
     *
     * @return string Chybová zpráva
     */
    public function getErrorMessage() {
        return $this->errorMessage;
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    abstract public function validateRule($value);

    function __toString() {
        return 'implement rule __toString method';
    }
}