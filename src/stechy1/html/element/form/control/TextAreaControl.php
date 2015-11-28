<?php

namespace stechy1\html\element\form\control;



use stechy1\html\element\AElement;
use stechy1\html\element\form\rule\MaxLengthRule;
use stechy1\html\KeyPairValue;

class TextAreaControl extends AFormControl {

    const SIGN = 'textarea';

    /**
     * TextAreaControl constructor
     *
     * @param string $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($name, $label = null) {
        return parent::__construct(self::SIGN, $name, $label);
    }

    /**
     * Nastaví obsah text arey
     *
     * @param mixed $value
     * @return $this
     */
    public function setValue($value) {
        $this->addContent($value);

        return $this;
    }

    /**
     * Nastaví autofocus po načtení stránky
     *
     * @return $this
     */
    public function setAutofocus() {
        $this->addAttribute('autofocus');

        return $this;
    }

    /**
     * Nastaví viditelnou šířku text area
     *
     * @param $count
     * @return $this
     */
    public function setCols($count) {
        $this->addAttribute(new KeyPairValue('cols', $count));

        return $this;
    }

    /**
     * Nastaví maximální počet znaků
     *
     * @param $maxLength int Maximální počet znaků
     * @return $this
     */
    public function setMaxLength($maxLength) {
        $this->addRule(new MaxLengthRule($maxLength));

        return $this;
    }

    /**
     * Nastaví viditelný počet řádek text area
     *
     * @param $count
     * @return $this
     */
    public function setRows ($count) {
        $this->addAttribute(new KeyPairValue('rows', $count));

        return $this;
    }

    /**
     * Nastaví zalamování řádků
     * @return $this
     */
    public function wrap() {
        $this->addAttribute('wrap');

        return $this;
    }
}