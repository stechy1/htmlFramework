<?php

namespace stechy1\html\element;


class ListItem extends AElement {

    const SIGN = "li";

    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }

}