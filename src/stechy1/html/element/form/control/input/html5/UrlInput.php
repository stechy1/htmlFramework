<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\AElement;
use stechy1\html\element\form\control\input\AInputControll;
use stechy1\html\element\form\rule\UrlRule;

class UrlInput extends AInputControll {

    const TYPE = 'text';

    /**
     * UrlInput constructor
     *
     * @param string $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $label = null) {
        parent::__construct(self::TYPE, $name, $label);
        $this->addRule(new UrlRule());

        return $this;
    }
}