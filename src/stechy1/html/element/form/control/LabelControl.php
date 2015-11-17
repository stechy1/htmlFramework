<?php

namespace stechy1\html\element\form\control;


use stechy1\html\NameValuePair;

class LabelControl extends AFormControl {

    const SIGN = 'label';

    /**
     * TextAreaControl constructor
     *
     * @param string|null $label Text v labelu
     */
    public function __construct($label = null) {
        parent::__construct(self::SIGN, null);
        $this->addContent($label);

        return $this;
    }

    /**
     * Nastaví, pro jakou kontrolku má label být
     *
     * @param $controlID string ID kontrolky
     * @return $this
     */
    public function setFor($controlID) {
        $this->addAttribute(new NameValuePair('for', $controlID));

        return $this;
    }

    /**
     * Přiřadí label formuláři
     *
     * @param $formID string ID formulář
     * @return $this
     */
    public function setForm($formID) {
        $this->addAttribute((new NameValuePair('form', $formID)));

        return $this;
    }
}