<?php

namespace stechy1\html\element\form\control\input;


use stechy1\html\element\form\control\AFormControl;
use stechy1\html\element\form\rule\MaxValueRule;
use stechy1\html\element\form\rule\MinValueRule;
use stechy1\html\NameValuePair;

abstract class AInputControll extends AFormControl {

    const SIGN = 'input';

    /**
     * AInputControll constructor.
     * @param string $type Typ input kontrolky.
     * @param string $name Jméno kontrolky.
     * @param null $label Popisek
     */
    public function __construct($type, $name, $label = null) {
        parent::__construct(self::SIGN, $name, $label);
        $this->addAttribute(new NameValuePair('type', $type));
        $this->pair = false;

        return $this;
    }

//    /**
//     * Nastaví minimální hodnotu čísla.
//     * @param $min int Minimální hodnota.
//     * @return $this Vrátí sám sebe.
//     */
//    public function setMinValue($min) {
//        $this->addRule(new MinValueRule($min));
//
//        return $this;
//    }
//
//    /**
//     * Nastaví maximální hodnotu čísla.
//     * @param $maxValue int Maximální hodnota.
//     * @return $this Vrátí sám sebe
//     */
//    public function setMaxValue($maxValue) {
//        $this->addRule(new MaxValueRule($maxValue));
//
//        return $this;
//    }
//
//    /**
//     * Nastaví krokování čísla kontrolky.
//     * @param $step int Krok.
//     * @return $this Vrátí sám sebe.
//     */
//    public function setStep($step) {
//        $this->addAttribute(new NameValuePair('step', $step));
//
//        return $this;
//    }
}