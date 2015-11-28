<?php

namespace stechy1\html\element;


use stechy1\html\KeyPairValue;

class ImageElement extends AElement {

    const SIGN = 'img';
    
    /**
     * DivElement constructor
     *
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($content = null) {
        parent::__construct(self::SIGN, $content);

        return $this;
    }

    /**
     * Nastaví zdrojovou cestu k obrázku
     *
     * @param $source string
     * @return $this
     */
    public function setSource($source) {
        $this->addAttribute(new KeyPairValue('src', $source));

        return $this;
    }

    /**
     * Nastaví popis obrázku
     *
     * @param $alt string
     * @return $this
     */
    public function setAlt ($alt) {
        $this->addAttribute(new KeyPairValue('alt', $alt));

        return $this;
    }

    /**
     * Nastaví šířku obrázku
     *
     * @param $width int
     * @return $this
     */
    public function setWidth($width) {
        $this->addAttribute(new KeyPairValue('width', $width . 'px'));

        return $this;
    }

    /**
     * Nastaví výšku obrázku
     *
     * @param $height int
     * @return $this
     */
    public function setHeight ($height) {
        $this->addAttribute(new KeyPairValue('height', $height));

        return $this;
    }
}