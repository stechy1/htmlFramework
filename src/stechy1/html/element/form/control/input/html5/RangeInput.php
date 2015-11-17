<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\ANumericInputControl;
use stechy1\html\element\form\control\LabelControl;

class RangeInput extends ANumericInputControl {

    const TYPE = 'range';

    /**
     * RangeInput constructor
     *
     * @param string $name Název kontrolky
     * @param int|null $value Aktuální hodnota
     * @param int|null $min Minimální hodnota
     * @param int|null $max Maximální hodnota
     * @param int|null $step Krok, o kolik se bude hodnota měnit
     * @param LabelControl|string|null $label Popisek
     */
    public function __construct($name, $value = null,  $min = null, $max = null, $step = null, $label = null) {
        parent::__construct(self::TYPE, $name, $value, $min, $max, $step, $label);
    }
}