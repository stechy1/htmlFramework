<?php

namespace stechy1\html\element\form\control\input;



use Exception;
use stechy1\html\element\AElement;

class SubmitInput extends AInputControll {

    const TYPE = 'submit';

    /**
     * SubmitInput constructor
     *
     * @param string $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $label = null) {
        parent::__construct(self::TYPE, $name);
        $this->setValue($label);
    }

    public final function addRule($rule) {
        throw new Exception("Tato funkce není povolena");
    }
}