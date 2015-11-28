<?php
/**
 * Created by PhpStorm.
 * User: stech
 * Date: 15.11.2015
 * Time: 16:38
 */

namespace stechy1\html\element\form\control;


use Exception;
use stechy1\html\element\AElement;
use stechy1\html\KeyPairValue;

class OptionControl extends AFormControl {

    const SIGN = "option";

    /**
     * OptionControl constructor
     *
     * @param string $value
     * @param AElement[]|AElement|string|array $content
     */
    public function __construct($value, $content = null) {
        parent::__construct(self::SIGN, null);
        $this->setValue($value);
        $this->addContent($content);

        return $this;
    }

    /**
     * Nastaví hodnotu
     *
     * @param mixed $value
     * @return $this
     */
    public function setValue ($value) {
        if ($value != null);
            $this->addAttribute(new KeyPairValue("value", $value));

        return $this;
    }

    /**
     * Nastaví placeholder
     *
     * @param $placeholder string Obsah placeholderu
     * @throws Exception
     */
    public function setPlaceholder ($placeholder) {
        throw new Exception("Tato funkce není povolena");
    }
}