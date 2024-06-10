<?php


namespace App\CatalogRefactoring\RenameField;


/**
 * Rename Field
 * As estruturas de dados são a chave para entender o que está acontecendo no software
 * Passos:
 * 1- Se o registro tiver escopo limitado, renomeie todos os acessos ao cmpo e teste; Não há necessidade de fazer o resto dos passos.
 * 2- Se o registor ainda não estiver encapsulado, aplique o Encapsulate Record
 * 3- Renomeie o cmapo privado dentro do objeto e ajuste os médodos internos para caber.
 * 4- Test
 * 
 * Neste exemplo a ideia foi atualizar o nome da organização para titulo, mas antes foi encapsulado a estrutura da organização. 
 */
class Refactored
{


    public function showOrganization()
    {
        $organization = $this->getOrganization();
        return "Title" . $organization->getTitle() . "<br>";
    }
    public function getOrganization()
    {
        return new Organization(['title' => 'Starlink', 'country' => "US"]);
    }
}
