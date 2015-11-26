<?php

namespace stechy1\html\element\form;


class AFormFactory implements IFormFactory {

    private static $counter = 0;

    /**
     * @var FormElement
     */
    protected $form;

    /**
     * AFormFactory constructor
     *
     * @param FormElement $form
     */
    public function __construct (FormElement $form = null) {
        if (func_num_args() == 0)
            $this->form = new FormElement("form_" . self::$counter++);
        else
            $this->form = $form;
    }


    /**
     * Vyrenderuje formulář
     *
     * @return string
     */
    public function render () {
        echo $this->form->render();
    }

    /**
     * Metoda zjistí, jestli byl formulář odeslán
     *
     * @return boolean TRUE, jestli byl formulář odeslán, jinak FALSE
     */
    public function isPostBack () {
        return $this->form->isPostBack();
    }

    /**
     * Zvaliduje kontrolku podle pravidel
     *
     * @return boolean True, pokud je kontrolka validní
     */
    public function isValid () {
        return $this->form->isValid();
    }

    /**
     * Vrátí chyby které vznikly při validaci kontrolky
     *
     * @return mixed
     */
    public function getErrors () {
        return $this->form->getErrors();
    }
}