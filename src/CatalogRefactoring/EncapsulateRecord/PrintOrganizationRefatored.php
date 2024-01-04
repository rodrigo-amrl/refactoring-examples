<?php

namespace App\CatalogRefactoring\EncapsulateRecord;

use App\CatalogRefactoring\EncapsulateRecord\Factories\OrganizationFactory;

/**
 * Encapsulate Record
 * Identificar segredos que módulos devem esconder do sistema. A estrutura de dados são os 
 * segredos mais comuns.
 * Passos
 * - Use o Encapsulate Variable na variável que contém o registro
 * - Substitua o conteúdo da variável por uma classe simples que envolva o registro.
 * Defina um acessador dentro dessa classe que retorno o registro bruto. Modifique as funções que encapsulam a variável
 * para usar esse acessador.
 * - Teste
 * - Forneça novas funç~eos que retornem o objeto em ves do registro bruto
 * - Para cada usuário do registro, substitua o uso de uma função que retorna o registro por uma função que retorna o objeto.
 * Use esse acessador no objeto para objer os dados do campo criando esse acessador, se necessário. 
 * - Remova o acessador de dados brutos da classe e as funções facilmente pesquisável que retornam o registro bruto
 *  - Teste
 * - Se os campos do registro forem estrutura, considere usar Encapsulate Recorde e Encapsulate Collection Recursivamente.
 */
class PrintOrganizationRefatored
{
    private object $organization;
    public function __construct()
    {
        $this->organization =  new Organization(...OrganizationFactory::make());
    }
    public function printHtml()
    {
        $result = '';
        $result .= "<h1> {$this->getOrganization()->getName()}</h1>";
        return $result;
    }
    private function getOrganization()
    {
        return $this->organization;
    }
}
