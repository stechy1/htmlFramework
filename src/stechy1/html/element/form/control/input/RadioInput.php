<?php

namespace stechy1\html\element\form\control\input;



class RadioInput extends AInputControll {

    const TYPE = 'radio';

    /**
     * CheckBoxInput constructor
     *
     * @param string $name Název kontrolky
     * @param string $value Hodnota
     * @param null $label Popisek
     */
    public function __construct($name, $value, $label = null) {
        parent::__construct(self::TYPE, $name, $label);

        $this->setValue($value);

        return $this;
    }
}