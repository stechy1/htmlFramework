<?php

namespace stechy1\html\element\form\rule;


class NumberRule extends ARule {

    const RULE = '[0-9]';

    /**
     * NumberRule constructor
     */
    public function __construct () {
        parent::__construct("Řetězec neobsahuje pouze čísla");
    }


    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule ($value) {
        return preg_match('~^' . self::RULE . '$~u', $value);
    }

    function __toString () {
        return '';
    }


}