<?php

namespace stechy1\html\element;


use stechy1\html\NameValuePair;

class AnchorElement extends AElement {

    const SIGN = 'a';

    /**
     * AnchorElement constructor
     *
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }

    /**
     * Nastaví adresu odkazu
     *
     * @param $address string
     * @return $this
     */
    public function setLocation($address) {
        $this->addAttribute(new NameValuePair('href', $address));

        return $this;
    }
}