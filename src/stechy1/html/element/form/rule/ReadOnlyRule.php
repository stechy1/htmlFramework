<?php

namespace stechy1\html\element\form\rule;


class ReadOnlyRule extends ARule {

    /**
     * ReadOnlyRule constructor
     */
    public function __construct() {
        parent::__construct('Kontrolka je pouze pro čtení');
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

    public function __toString () {
        return 'readonly';
    }
}