<?php

namespace stechy1\html\element\form\control\input;


use stechy1\html\element\form\control\LabelControl;
use stechy1\html\element\form\rule\MaxValueRule;
use stechy1\html\element\form\rule\MinValueRule;
use stechy1\html\NameValuePair;

class ANumericInputControl extends AInputControll {

    /**
     * ANumericInputControl constructor
     *
     * @param string $type Typ kontrolky
     * @param string $name Název kontrolky
     * @param int|null $value Aktuální hodnota
     * @param int|null $min Minimální hodnota
     * @param int|null $max Maximální hodnota
     * @param int|null $step Krok, o kolik se bude hodnota měnit
     * @param LabelControl|string|null $label Popisek
     */
    public function __construct ($type, $name, $value = null,  $min = null, $max = null, $step = null, $label = null) {
        parent::__construct($type, $name, $label);

        if(!empty($value) && is_numeric($value))
            $this->setValue($value);
        if(!empty($min) && is_numeric($min))
            $this->setMinValue($min);
        if(!empty($max) && is_numeric($max))
            $this->setMaxValue($max);
        if(!empty($step) && is_numeric($step))
            $this->setStep($step);

        return $this;
    }


    /**
     * Nastaví minimální hodnotu čísla
     *
     * @param $min int Minimální hodnota
     * @return $this
     */
    public function setMinValue($min) {
        $this->addRule(new MinValueRule($min));

        return $this;
    }

    /**
     * Nastaví maximální hodnotu čísla
     *
     * @param $maxValue int Maximální hodnota
     * @return $this
     */
    public function setMaxValue($maxValue) {
        $this->addRule(new MaxValueRule($maxValue));

        return $this;
    }

    /**
     * Nastaví krokování čísla kontrolky
     *
     * @param $step int Krok
     * @return $this
     */
    public function setStep($step) {
        $this->addAttribute(new NameValuePair('step', $step));

        return $this;
    }

}