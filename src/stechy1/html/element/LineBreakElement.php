<?php

namespace stechy1\html\element;


use Exception;

class LineBreakElement extends AElement {

    const SIGN = 'br';

    /**
     * LineBreakElement constructor.
     */
    public function __construct () {
        parent::__construct(self::SIGN, null);
        $this->pair = false;

        return $this;
    }

    /**
     * Nastaví obsah.
     * @param $content AElement|string Obsah elementu.
     * @return $this
     * @throws Exception
     */
    public function addContent($content) {
        throw new Exception("This function is not allowed!");
    }


}