<?php

namespace stechy1\html\element\form\control\input\html5;


use stechy1\html\element\form\control\input\AInputControll;
use stechy1\html\element\form\rule\EmailRule;

class EmailInput extends AInputControll {

    const TYPE = 'email';

    /**
     * EmailInput constructor.
     * @param string $name Název kontrolky.
     * @param null $label Popisek.
     */
    public function __construct($name, $label = null) {
        $this->addRule(new EmailRule());
        return parent::__construct(self::TYPE, $name, $label);
    }
}