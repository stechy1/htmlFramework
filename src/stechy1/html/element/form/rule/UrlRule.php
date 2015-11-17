<?php

namespace stechy1\html\element\form\rule;


class UrlRule extends ARule {

    const
        RULE = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

    /**
     * UrlRule constructor
     */
    public function __construct () {
        parent::__construct("Zadaná hodnota není ve tvaru url adresy");
    }

    /**
     * Zvaliduje hodnotu
     *
     * @param $value mixed Validovaná hodnota
     * @return boolean True, pokud je hodnota validní, jinak false
     */
    public function validateRule ($value) {
        return preg_match(self::RULE, $value);
    }

    function __toString() {
        return '';
    }
}