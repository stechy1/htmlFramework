<?php

namespace stechy1\html\element;


class SpanElement extends AElement {

    const SIGN = "span";

    /**
     * DivElement constructor.
     * @param null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }
}