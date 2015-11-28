<?php

namespace stechy1\html\element\form\control\input;



use Exception;
use stechy1\html\element\AElement;
use stechy1\html\KeyPairValue;

class ButtonInput extends AInputControll {

    const TYPE = 'button';

    /**
     * TextInput constructor
     *
     * @param string $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $label = null) {
        $this->setValue($label);
        return parent::__construct(self::TYPE, $name);
    }

    /**
     * Nastaví událost po kliknutí na tlačítko
     *
     * Předpokládá se javascriptový řetězec, proto je vypnuté escapování
     * @param string $function
     */
    public function setOnClick ($function) {
        $this->addAttribute(new KeyPairValue('onclick', $function, false));
    }

    public final function addRule($rule) {
        throw new Exception("Tato funkce není povolena");
    }


}