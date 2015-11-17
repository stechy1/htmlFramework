<?php
/**
 * Created by PhpStorm.
 * User: stech
 * Date: 15.11.2015
 * Time: 16:38
 */

namespace stechy1\html\element\form\control;


use stechy1\html\NameValuePair;

class OptionControl extends AFormControl {

    const SIGN = "option";

    /**
     * OptionControl constructor
     * @param string $value
     * @param null $content
     */
    public function __construct($value, $content = null) {
        parent::__construct(self::SIGN, null);
        $this->setValue($value);
        $this->addContent($content);

        return $this;
    }

    public function setValue ($value) {
        if ($value != null);
            $this->addAttribute(new NameValuePair("value", $value));

        return $this;
    }
}