<?php

namespace stechy1\html\element\form\rule;

/**
 * Class RequiredRule
 * @package stechy1\html\element\form\rule
 * Třída představuje pravidlo povinného vstupního textového pole.
 */
class RequiredRule extends ARule {

    /**
     * RequiredRule constructor
     */
    public function __construct() {
        return parent::__construct('Povinné pole');
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule($value) {
        $x = !(!isset($value) || trim($value)==='');
        return $x;
    }

    function __toString() {
        return 'required';
    }


}