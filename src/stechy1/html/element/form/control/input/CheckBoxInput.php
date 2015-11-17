<?php

namespace stechy1\html\element\form\control\input;



use stechy1\html\element\AElement;

class CheckBoxInput extends AInputControll {

    const TYPE = 'checkbox';

    /**
     * CheckBoxInput constructor
     *
     * @param string $name Název kontrolky
     * @param string $value Hodnota
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $value, $label = null) {
        parent::__construct(self::TYPE, $name, $label);

        $this->setValue($value);
        $this->removeClass('form-group');

        return $this;
    }
}