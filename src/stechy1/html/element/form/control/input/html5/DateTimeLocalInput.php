<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\ANumericInputControl;
use stechy1\html\element\form\control\LabelControl;

class DateTimeLocalInput extends ANumericInputControl {

    const TYPE = 'datetime-local';

    /**
     * Month constructor
     *
     * @param string $name Název kontrolky
     * @param int|null $value Aktuální hodnota
     * @param int|null $min Minimální hodnota
     * @param int|null $max Maximální hodnota
     * @param LabelControl|string|null $label Popisek
     */
    public function __construct($name, $value = null,  $min = null, $max = null, $label = null) {
        return parent::__construct(self::TYPE, $name, $value, $min, $max, null, $label);
    }
}