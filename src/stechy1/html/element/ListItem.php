<?php

namespace stechy1\html\element;


class ListItem extends AElement {

    const SIGN = "li";

    /**
     * ListItem constructor
     *
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }

}