<?php

namespace App\CatalogRefactoring\ChangeReferenceToValue;


/**
 * Change Reference To Value
 * 1- Verifique se a classe candidata é imutável ou pode se tornar imutável
 * 2- Para cada setter, aplique Método  Remove Setting Method
 * 3 - Forneça um método de igualdade baseado em valor que use os campos do objeto de valor.
 */
class PersonOld
{



    private TelephoneNumberOld $telephoneNumber;
    public function __construct()
    {

        $this->telephoneNumber = new TelephoneNumberOld();
    }

    public function getOfficeAreaCode()
    {
        return $this->telephoneNumber->getAreaCode();
    }
    public function setOfficeAreaCode($new_area_code)
    {
        $this->telephoneNumber->setAreaCode($new_area_code);
    }
    public function getOfficeNumber()
    {
        return $this->telephoneNumber->getNumber();
    }
    public function setOfficeNumber($new_number)
    {
        $this->telephoneNumber->setNumber($new_number);
    }
}
