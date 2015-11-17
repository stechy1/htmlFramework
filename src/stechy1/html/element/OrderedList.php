<?php

namespace stechy1\html\element;


use Exception;

class OrderedList extends AElement {

    const SIGN = "ol";
    /**
     * @var ListItem[]|ListItem|string[]|string Pole položek seznamu
     */
    private $items;

    public function __construct($items = null) {
        parent::__construct(self::SIGN);
        $this->setItems($items);

        return $this;
    }

    /**
     * Nastaví obsah
     *
     * @param $content AElement[]|AElement|string|null Obsah elementu
     * @return $this
     * @throws Exception
     */
    public function addContent($content) {
        throw new Exception("This function is not allowed!");
    }

    /**
     * @param $items ListItem[]|ListItem|string[]|string Pole položek seznamu
     */
    public function setItems($items) {
        if(!is_array($items)) {
            $tmpItems = array();
            foreach($items as $key => $value) {
                $item = $value;
                if(is_string($value))
                    $item = new ListItem($value);
                $item->setID($key);

                $tmpItems[] = $item;
            }
            $this->items = $tmpItems;
        } else
            $this->items = $items;
    }

    /**
     * Metoda, která se stará o samotné sestavení obsahu elementu
     */
    protected function writeContent() {
        //parent::writeContent();
        if ($this->items instanceof ListItem)
            foreach ($this->items as $listItem)
                $this->html .= $listItem->render();
        elseif (is_array($this->items)) {
            foreach ($this->items as $key => $value) {
                $this->html .= (new ListItem($value))->setID($key)->setEscape(false)->render();
            }
        }
    }
}