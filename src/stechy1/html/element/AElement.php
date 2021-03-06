<?php

namespace stechy1\html\element;


use stechy1\html\AAttribute;
use stechy1\html\StyleValue;
use stechy1\html\KeyPairValue;

abstract class AElement implements \ArrayAccess {

    /**
     * @var string Obsah HTML kódu
     */
    protected $html = '';
    /**
     * @var string  Značka HTML elementu
     */
    protected $sign;
    /**
     * @var string ID HTML elementu
     */
    protected $id;
    /**
     * @var array|null|AElement|string Obsah elementu
     */
    protected $content;
    /**
     * @var string[] Pole CSS tříd
     */
    protected $classArray = array();
    /**
     * @var StyleValue[] Pole StyleValue objektů představující styly
     */
    protected $styleArray = array();
    /**
     * @var KeyPairValue[] Pole NameValuePair objektů představující jednotlivé attributy
     */
    protected $attributeArray = array();
    /**
     * @var bool True, pokud je HTML element párový, jinak false
     */
    protected $pair;
    /**
     * @var bool True, pokud se má obsah escapovat, jina k false
     */
    protected $escape;

    /**
     * AElement constructor
     *
     * @param $sign string HTML značka popisující HTML element
     * @param AElement[]|AElement|string|null $content
     */
    public function __construct($sign, $content = null) {
        $this->sign = $sign;
        if(is_array($content))
            $this->content = $content;
        elseif($content != null && ($content instanceof AElement || is_string($content)))
            $this->content[] = $content;
        $this->pair = true;
        $this->escape = true;

        return $this;
    }

    /**
     * Nastaví elementu ID
     *
     * @param $id string Název IDcka
     * @return $this
     */
    public function setID($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Odebere elementu ID
     */
    public function removeID() {
        $this->id = null;
    }

    /**
     * Přidá elementu třídu stylu
     *
     * @param $class string|array Název třídy
     * @return $this
     */
    public function addClass($class) {
        if(is_array($class))
            $this->classArray = array_merge($this->classArray, $class);
        else
            $this->classArray[] = $class;

        return $this;
    }

    /**
     * Odebere třídu z atributů
     *
     * @param $class string Název třídy
     */
    public function removeClass($class) {
        $key = array_search($class, $this->classArray);
        if($key)
            unset($this->classArray[$key]);
    }

    /**
     * Přidá danému elementu styl
     *
     * @param $style StyleValue|array Nový styl
     * @return $this
     */
    public function addStyle($style) {
        if(is_array($style))
            $this->styleArray = array_merge($this->styleArray, $style);
        else
            $this->styleArray[] = $style;

        return $this;
    }

    /**
     * Přidá danému elementu atribut
     *
     * @param $attribute KeyPairValue|string|array Nový atribut
     * @return $this
     */
    public function addAttribute($attribute) {
        if(is_array($attribute))
            $this->attributeArray = array_merge($this->attributeArray, $attribute);
        else
            $this->setAttribute($attribute);

        return $this;
    }

    /**
     * Nastaví atribut
     *
     * @param $attribute AAttribute|string
     * @param null $key
     */
    public function setAttribute($attribute, $key = null) {
        if ($key != null)
            $this->attributeArray[$key] = $attribute;
        else
            if ($attribute instanceof AAttribute)
                $this->attributeArray[$attribute->getKey()] = $attribute;
            else
                $this->attributeArray[] = $attribute;
    }

    /**
     * Nastaví obsah
     *
     * @param $content AElement[]|AElement|string|array Obsah elementu
     * @return $this
     */
    public function addContent($content) {
        if(is_array($content))
            $this->content = array_merge($this->content, $content);
        else {
            if ($content instanceof AElement && ($name = $content->getAttribute('name') != null))
                $this->content[$name] = $content;
            else
                $this->content[] = $content;
        }

        return $this;
    }

    /**
     * Nastaví, zda-li se má obsah escapovat či nikoliv
     *
     * @param $escape bool True, po zapnutí escapování, jinak false
     * @return $this
     */
    public function setEscape($escape) {
        $this->escape = $escape;

        return $this;
    }

    /**
     * Sestavý validní HTML kód
     */
    public function build() {
        $this->openTag();
        $this->beforeWriteContent();
        $this->writeContent();
        $this->afterWriteContent();
        $this->closeTag();

        return $this;
    }

    /**
     * Otevře značku a zapíše k ní všechny atributy
     */
    protected function openTag() {
        $this->html .= '<' . $this->sign . ' ';
        if($this->id != null)
            $this->html .= 'id="' . htmlspecialchars($this->id) . '" ';
        if(!empty($this->classArray))
            $this->html .= 'class="' . (htmlspecialchars(join(' ', $this->classArray))) . '" ';
        if(!empty($this->styleArray))
            $this->html .= 'style="' . htmlspecialchars(join(' ', $this->styleArray)) . '" ';
        if(!empty($this->attributeArray))
            $this->html .= join(' ', $this->attributeArray);
        if($this->pair)
            $this->html .= '>';
        else
            $this->html .= '/>';
    }

    /**
     * Metoda je zavolána před začátkem sestavování obsahu elementu
     */
    protected function beforeWriteContent() {}

    /**
     * Metoda, která se stará o samotné sestavení obsahu elementu
     */
    protected function writeContent() {
        if (!empty($this->content))
            foreach ($this->content as $content) {
                if ($content instanceof AElement)
                    $this->html .= $content->render();
                elseif ($content != null)
                    if ($this->escape) {
                        $this->html .= htmlspecialchars($content);
                    } else
                        $this->html .= $content;
            }
    }

    /**
     * Metoda je zavolána po sestavení obsahu elementu
     */
    protected function afterWriteContent() {

    }

    /**
     * Metoda uzavře element
     */
    protected function closeTag() {
        if($this->pair)
            $this->html .= '</' . $this->sign . '>';
    }

    /**
     * @return string Vrátí validní HTML kód, pokud není sestavený, tak ho sestaví
     */
    public function render() {
        if($this->html == null)
            $this->build();

        return $this->html;
    }

    /**
     * Zjistí, zda-li je element párový, či nikoliv
     *
     * @return boolean True, pokud je element párový, jinak false
     */
    public function isPair() {
        return $this->pair;
    }

    /**
     * Vrátí atribut podle zadaného klíče
     *
     * @param $key string Klíč
     * @return null|AAttribute
     */
    public function getAttribute($key) {
        return isset($this->attributeArray[$key]) ? $this->attributeArray[$key] : null;
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetExists ($offset) {
        return isset($this->content[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet ($offset) {
        return isset($this->content[$offset]) ? $this->content[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet ($offset, $value) {
        if (is_null($offset))
            $this->content[] = $value;
        else
            $this->content[$offset] = $value;
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetUnset ($offset) {
        unset($this->content[$offset]);
    }


    function __toString() {
        return $this->render();
    }
}