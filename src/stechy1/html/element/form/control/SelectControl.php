<?php

namespace stechy1\html\element\form\control;


use Exception;
use stechy1\html\element\AElement;

class SelectControl extends AFormControl {

    const SIGN = 'select';

    private $items;

    /**
     * SelectControl constructor
     *
     * @param string $name
     * @param $items OptionControl[]|OptionControl|string[]
     * @param AElement|string|null $label
     */
    public function __construct ($name, $items, $label = null) {
        parent::__construct(self::SIGN, $name, $label);
        $this->items = $items;
    }

    /**
     * Nastaví obsah
     *
     * @param $content AElement|string Obsah elementu
     * @return $this
     * @throws Exception Tato funkce není povolena
     */
    public function addContent($content) {
        throw new Exception("This function is not allowed!");
    }

    /**
     * Upravená metoda vypsání obsahu selectu
     */
    protected function writeContent () {
        if ($this->items instanceof OptionControl)
            foreach ($this->items as $item)
                $this->html .= $item->render();
        elseif (is_array($this->items))
            foreach ($this->items as $key => $value)
                $this->html .= (new OptionControl($value, $key))->render();

    }

}