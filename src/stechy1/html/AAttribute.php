<?php

namespace stechy1\html;

/**
 * Class AAtribute
 * Rozhraní definující metody pro různé typy atributů
 * @package stechy1\html
 */
abstract class AAttribute {

    protected $key;
    protected $value;
    protected $escape;

    /**
     * AAtribute constructor.
     * @param $key string Klíč
     * @param $value mixed Hodnota
     * @param bool $escape True, pokud se má hodnota escapovat, jinak false
     */
    public function __construct ($key, $value, $escape = true) {
        $this->key = $key;
        $this->value = $value;
        $this->escape = $escape;
    }

    /**
     * Vrátí klíč
     *
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * Vrátí hodnotu
     *
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Vrátí validní html kód
     *
     * @return string
     */
    abstract function render();

}