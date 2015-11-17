<?php

namespace stechy1\html\element\form\control\input;



use stechy1\html\element\AElement;

class TextInput extends AInputControll {

    const TYPE = 'text';

    /**
     * TextInput constructor
     *
     * @param string $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $label = null) {
        return parent::__construct(self::TYPE, $name, $label);
    }

}