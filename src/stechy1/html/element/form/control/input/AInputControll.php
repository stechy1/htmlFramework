<?php

namespace stechy1\html\element\form\control\input;


use stechy1\html\element\AElement;
use stechy1\html\element\form\control\AFormControl;
use stechy1\html\NameValuePair;

abstract class AInputControll extends AFormControl {

    const SIGN = 'input';

    /**
     * AInputControll constructor
     *
     * @param string $type Typ input kontrolky
     * @param string $name Jméno kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($type, $name, $label = null) {
        parent::__construct(self::SIGN, $name, $label);
        $this->addAttribute(new NameValuePair('type', $type));
        $this->pair = false;

        return $this;
    }
}