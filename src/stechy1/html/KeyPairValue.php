<?php

namespace stechy1\html;


final class KeyPairValue extends AAttribute {

    /**
     * NameValuePair constructor
     *
     * @param $key string Klíč
     * @param $value mixed Hodnota
     * @param bool $escape True, pokud se má hodnota escapovat, jinak false
     */
    public function __construct($key, $value, $escape = true) {
        parent::__construct($key, $value, $escape);
    }

    /**
     *  Vrátí validní html kód
     *
     * @return string
     */
    function render () {
        return $this->key . '="' . (($this->escape)? htmlspecialchars($this->value) : $this->value) . '"';
    }

    function __toString() {
        return $this->render();
    }


}