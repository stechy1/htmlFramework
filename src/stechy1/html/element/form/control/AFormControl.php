<?php

namespace stechy1\html\element\form\control;


use stechy1\html\element\AElement;
use stechy1\html\element\form\IControl;
use stechy1\html\element\form\rule\ARule;
use stechy1\html\KeyPairValue;

abstract class AFormControl extends AElement implements IControl {

    /**
     * @var string Identifikační název kontrolky
     */
    protected $name;
    /**
     * @var mixed Hodnota v kontrolce
     */
    protected $value;
    /**
     * @var LabelControl Popisek kontrolky
     */
    protected $label;
    /**
     * @var ARule[] Pole obsahující validační pravidla
     */
    protected $rules = array();
    /**
     * @var array Kolekce s chybami v kontrolce
     */
    protected $errorArray = array();

    /**
     * @param string $sign Značka elementu
     *
     * @param string|null $name Název kontrolky
     * @param AElement|string|null $label Popisek
     */
    public function __construct($sign, $name = null, $label = null) {
        parent::__construct($sign);
        $this->name = $name;
        $this->setID($name);
        if($label !== null) {
            if (is_string($label))
                $label = new LabelControl($label);
            $this->label = $label;
            $this->label->setFor($name);
        }

        return $this;
    }

    /**
     * Přidá validační pravidlo pro kontrolku
     *
     * @param ARule[]|ARule $rule Validační pravidlo
     * @return $this
     */
    public function addRule ($rule) {
        if(is_array($rule))
            $this->rules = array_merge($this->rules, $rule);
        else
            $this->rules[] = $rule;

        return $this;
    }

    /**
     * Sestavý validní HTML kód
     */
    public function build() {
        if($this->label !== null && $this->label instanceof LabelControl)
            $this->html .= $this->label->render();
        if($this->name !== null)
            $this->addAttribute(new KeyPairValue('name', $this->name));
        if(!empty($this->value))
            $this->addAttribute(new KeyPairValue('value', $this->value));
        foreach($this->rules as $rule)
            $this->addAttribute($rule);
        parent::build();
        return $this;
    }

    /**
     * Nastaví hodnotu kontrolce
     *
     * @param $value mixed Hodnota
     * @return $this
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * Nastaví placeholder
     *
     * @param $placeholder string Obsah placeholderu
     * @return $this
     */
    public function setPlaceholder ($placeholder) {
        $this->addAttribute(new KeyPairValue('placeholder', $placeholder));

        return $this;
    }

    /**
     * Vrátí hodnotu kontrolky
     *
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Zvaliduje kontrolku podle pravidel
     *
     * @return boolean True, pokud je kontrolka validní
     */
    public function isValid() {
        foreach($this->rules as $rule) {
            if(!$rule->validateRule($this->value)){
                $this->errorArray[] = $rule->getErrorMessage();
                return false;
            }
        }

        return true;
    }

    /**
     * Vrátí chyby které vznikly při validaci kontrolky
     *
     * @return array
     */
    public function getErrors() {
        return $this->errorArray;
    }

    /**
     * Vrátí identifikační název kontrolky
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Vrátí referenci na label
     *
     * @return LabelControl
     */
    public function getLabel () {
        return $this->label;
    }

    /**
     * Nastaví label pro kontrolku
     *
     * @param LabelControl|string $label
     * @return $this
     */
    public function setLabel($label) {
        if (is_string($label))
            $label = (new LabelControl($label));

        $this->label = $label;
        $this->label->addAttribute(new KeyPairValue("for", $this->getName()));

        return $this;
    }

    /**
     * Nastaví tooltip kontrolky
     *
     * @param $title string Text v tooltipu
     * @return $this
     */
    public function setTooltip ($title) {
        $this->addAttribute(new KeyPairValue('title', $title));

        return $this;
    }

    /**
     * Nastaví výchozí hodnotu
     *
     * @param $value
     * @return $this
     */
    public function setDefaultValue ($value) {
        if ($this->value == null)
            $this->value = $value;

        return $this;
    }
}