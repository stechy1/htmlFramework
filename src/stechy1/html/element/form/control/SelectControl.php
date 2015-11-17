<?php

namespace stechy1\html\element\form\control;


use Exception;
use stechy1\html\element\AElement;
use stechy1\html\element\ListItem;

class SelectControl extends AFormControl {

    const SIGN = 'select';

    private $items;

    /**
     * SelectControl constructor.
     * @param string $name
     * @param $items OptionControl[]|OptionControl|string[]
     * @param null $label
     */
    public function __construct ($name, $items, $label = null) {
        parent::__construct(self::SIGN, $name, $label);
        $this->items = $items;
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

    protected function writeContent () {
        if ($this->items instanceof OptionControl)
            foreach ($this->items as $item)
                $this->html .= $item->render();
        elseif (is_array($this->items))
            foreach ($this->items as $key => $value)
                $this->html .= $this->generateOption($value, $key)->render();

    }

    protected function generateOption($value, $content) {
        $option = new OptionControl($value, $content);
        return $option;
    }

}