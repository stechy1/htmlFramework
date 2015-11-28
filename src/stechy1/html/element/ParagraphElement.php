<?php

namespace stechy1\html\element;


use stechy1\html\KeyPairValue;

class ParagraphElement extends AElement {

    const SIGN = "p";

    /**
     * ParagraphElement constructor
     *
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }

    /**
     * Nastaví nadpis odstavce
     *
     * @param $title string Nadpis odstavce
     * @return $this
     */
    public function setTitle($title) {
        $this->addAttribute(new KeyPairValue('title', $title));

        return $this;
    }
}