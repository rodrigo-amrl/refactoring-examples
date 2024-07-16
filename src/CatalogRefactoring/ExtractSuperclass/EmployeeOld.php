<?php

namespace App\CatalogRefactoring\ExtractSuperclass;

/*
  Extract Superclass

  #region Motivação
                Se eu vir duas classes fazendo coisas semelhantes, posso aproveitar o mecanismo básico de herança
        para reunir suas semelhanças em uma superclasse. Posso usar Pull Up Field (353) para mover
        dados comuns para a superclasse e Pull Up Method (350) para mover o comportamento comum.
                Muitos escritores sobre orientação a objetos tratam a herança como algo que deve ser
        cuidadosamente planejado com antecedência, com base em algum tipo de estrutura de classificação
        no “mundo real”. Tais estruturas de classificação podem ser uma dica para o uso de herança – mas apenas
        muitas vezes a herança é algo que percebo durante a evolução de um programa, à medida
        que encontro elementos comuns que desejo reunir.
                Uma alternativa para Extract Superclass é Extract Class (182). Aqui você tem, essencialmente, uma escolha
        entre usar herança ou delegação como forma de unificar o comportamento duplicado.
        Freqüentemente, Extrair Superclasse é a abordagem mais simples, então farei isso primeiro sabendo que
        posso usar Substituir Superclasse por Delegado (399) caso precise mais tarde.
  #endregion
 
 Passos:
 1 - Crie uma superclasse vazia. Faça das classes originais suas subclasses.Se necessário, use Declaração de Função de Alteração (124) nos construtores
 2 - Teste
 3 - Um por um, use Pull Up Constructor Body (355), Pull Up Method (350) e Pull Up Field (353) para mover elementos comuns para a superclass 
 4 - Examine os métodos restantes nas subclasses. Veja se há partes comuns. Nesse caso, use a Função Extrair (106) seguida pelo Método Pull Up (350).
 5 - Verifique os clientes das classes originais. Considere ajustá-los para usar a interface da superclasse
  */

class EmployeeOld
{
    public function __construct(
        protected string $name,
        protected int $id,
        protected $monthly_cost
    ) {
    }
    public function getMonthlyCost()
    {
        return $this->monthly_cost;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAnnualCost()
    {
        return $this->monthly_cost * 12;
    }
}
