<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\AInputControll;

class UrlInput extends AInputControll {

    const TYPE = 'url';

    /**
     * UrlInput constructor.
     * @param string $name Název kontrolky.
     * @param null $label Popisek.
     */
    public function __construct($name, $label = null) {
        return parent::__construct(self::TYPE, $name, $label);
    }
}