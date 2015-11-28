<?php

namespace stechy1\html;


class StyleValue extends AAttribute {

    /**
     * StyleValue constructor
     *
     * @param $key string Klíč
     * @param $value mixed Hodnota
     */
    public function __construct($key, $value) {
        parent::__construct($key, $value);
    }

    /**
     * Vrátí validní html kód
     *
     * @return string
     */
    function render () {
        return $this->getKey() . ': ' . $this->getValue() . '; ';
    }

    function __toString() {
        return $this->render();
    }

}