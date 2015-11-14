<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\AInputControll;

class SearchInput extends AInputControll {

    const TYPE = 'search';

    /**
     * SearchInput constructor.
     * @param string $name Název kontrolky.
     * @param null $label Popisek.
     */
    public function __construct($name, $label = null) {
        return parent::__construct(self::TYPE, $name, $label);
    }
}