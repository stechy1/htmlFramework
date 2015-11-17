<?php

namespace stechy1\html\element;


use Exception;

class OrderedList extends AElement {

    const SIGN = "ul";
    /**
     * @var ListItem[]|string[] Pole položek seznamu.
     */
    private $items;

    public function __construct($items = null) {
        parent::__construct(self::SIGN);
        $this->setItems($items);

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

    /**
     * @param $items array Pole položek seznamu
     */
    public function setItems($items) {
        $this->items = $items;
    }

    /**
     * Metoda, která se stará o samotné sestavení obsahu elementu.
     */
    protected function writeContent() {
        //parent::writeContent();
        if ($this->items instanceof ListItem)
            foreach ($this->items as $listItem)
                $this->html .= $listItem->render();
        elseif (is_array($this->items)) {
            foreach ($this->items as $key => $value) {
                $this->html .= $this->generateListItem($key, $value)->render();
            }
        }
    }

    /**
     * @param $key string
     * @param $value string
     * @return ListItem
     */
    protected function generateListItem($key, $value) {
        $item = new ListItem($value);
        $item->setID($key);

        return $item;
    }

}