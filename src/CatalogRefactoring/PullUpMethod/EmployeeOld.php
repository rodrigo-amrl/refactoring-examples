<?php

namespace App\CatalogRefactoring\PullUpMethod;

/*
  Pull Up Method

  #region Motivação
        Eliminar código duplicado é importante. Dois métodos duplicados podem funcionar bem como estão,
    mas nada mais são do que um terreno fértil para bugs no futuro. Sempre que haja duplicação,
    existe o risco de a alteração de uma cópia não ser feita na outra. Normalmente é difícil encontrar duplicatas.
        O caso mais fácil de usar o Método Pull Up é quando os métodos têm o mesmo corpo, o que
    implica que houve uma cópia e colagem. Claro que nem sempre é tão óbvio assim. Eu poderia
    simplesmente fazer a refatoração e ver se os testes funcionam – mas isso coloca muita confiança
    nos meus testes. Geralmente acho valioso procurar as diferenças – muitas vezes, elas
    mostram comportamentos que esqueci de testar.
         Freqüentemente, o método Pull Up vem após outras etapas. Vejo dois métodos em classes
    diferentes que podem ser parametrizados de forma que acabem sendo essencialmente
    o mesmo método. Nesse caso, o menor passo é aplicar a Função Parametrizar (310)
    separadamente e depois o Método Pull Up.
  #endregion

  Passos:
  1 - Inspecione os métodos para garantir que sejam idênticos. Se eles fizerem a mesma coisa, mas não forem idênticos, 
  refatore-os até que tenham corpos identicos
  2 - Verifique se todas as chamadas de método e referências de campo dentro do corpo do método referemse a 
      recursos que podem ser chamados a partir da superclasse.
  3 - Se os métodos tiverem assinaturas diferentes, use Declaração de Função de Mudança (124) para levá-
los para aquela que você deseja usar na superclasse.
  4 - Crie um novo método na superclasse. Copie o corpo de um dos métodos para isto
  5 - Exclua um método de subclasse
  6 - Teste
  7 - Continue excluindo métodos de subclasse até que todos desapareçam.

*/

class EmployeeOld extends PartyOld
{
  protected float $monthly_cost = 280;


  public function getAnnualCost()
  {
    return $this->monthly_cost * 12;
  }
}
