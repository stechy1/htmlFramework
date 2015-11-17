<?php

namespace stechy1\html\element;


use stechy1\html\NameValuePair;
use stechy1\html\StyleValue;

interface IDecorative {

    /**
     * Nastaví elementu ID
     *
     * @param $id string Název IDcka
     * @return $this
     */
    public function setID($id);

    /**
     * Přidá elementu třídu stylu
     *
     * @param $class string|array Název třídy
     * @return $this
     */
    public function addClass($class);

    /**
     * Přidá danému elementu styl
     *
     * @param $style StyleValue|array Nový styl
     * @return $this
     */
    public function addStyle($style);

    /**
     * Přidá danému elementu atribut
     *
     * @param $attribute NameValuePair|string|array Nový atribut
     * @return $this
     */
    public function addAttribute($attribute);
}