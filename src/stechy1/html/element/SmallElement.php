<?php

namespace stechy1\html\element;


class SmallElement extends AElement {

    const SIGN = "small";

    /**
     * DivElement constructor.
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }
}