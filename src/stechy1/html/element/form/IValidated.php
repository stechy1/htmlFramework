<?php

namespace stechy1\html\element\form;


interface IValidated {

    /**
     * Zvaliduje kontrolku podle pravidel
     *
     * @return boolean True, pokud je kontrolka validní
     */
    public function isValid();

    /**
     * Vrátí chyby které vznikly při validaci kontrolky
     *
     * @return mixed
     */
    public function getErrors();
}