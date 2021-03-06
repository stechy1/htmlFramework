<?php

namespace stechy1\html;


use stechy1\html\element\AElement;

class HtmlBuilder {

    private $container = array();
    private $html;

    /**
     * HtmlBuilder constructor
     *
     * @param $container AElement|string
     */
    public function __construct($container = null) {
        if($container != null)
            $this->container[] = $container;
        $this->html = '';
    }

    /**
     * Přidá element do pole pro sestavení
     *
     * @param AElement $element HTML prvek
     */
    public function addElement(AElement $element) {
        if(is_array($element))
            $this->container = array_merge($this->container, $element);
        else
            $this->container[] = $element;

        $this->container[] = $element;
    }

    /**
     * Sestaví validní html kód pro elementy
     *
     * @return $this
     */
    public function build() {
        /** @var $element AElement */
        foreach($this->container as $element) {
            $this->html .= $element->render();
        }
        return $this;
    }

    /**
     * Vrátí validní HTML kód prvku
     *
     * @return string HTML kód
     */
    public function render() {
        if($this->html == null)
            $this->build();

        return $this->html;
    }

    function __toString() {
        return $this->render();
    }
}