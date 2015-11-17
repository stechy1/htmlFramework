<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\ANumericInputControl;
use stechy1\html\element\form\control\LabelControl;
use stechy1\html\element\form\rule\DateTimeRule;

class DateTimeInput extends ANumericInputControl {

    const TYPE = 'datetime';

    /**
     * DateInput constructor
     *
     * @param string $name Název kontrolky
     * @param int|null $value Aktuální hodnota
     * @param int|null $min Minimální hodnota
     * @param int|null $max Maximální hodnota
     * @param LabelControl|string|null $label Popisek
     */
    public function __construct($name, $value = null,  $min = null, $max = null, $label = null) {
        parent::__construct(self::TYPE, $name, $value, $min, $max, null, $label);

        $this->addRule(new DateTimeRule());

        return $this;
    }
}