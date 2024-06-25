<?php

namespace App\CatalogRefactoring\PreserveWholeObject;

/*
  Preserve Whole Object
  Se eu vir um código que deriva alguns valores de um registro e depois passa esses valorespara uma função, 
  gosto de substituir esses valores pelo próprio registro inteiro, deixando o corpo da função derivar os valores necessários.
  
  Passos:
  1- Crie uma função vazia com os parâmetros desejados.Dê à função um nome facilmente pesquisável para que ela possa ser substituída no final.
  2 - Preencha o corpo da nova função com uma chamada para a função antiga, mapeando os novos parâmetros para os antigos
  3 - Execute verificações estática
  4 - Ajuste cada chamador para usar a nova função, testando após cada alteração.
  Isso pode significar que algum código que deriva o parâmetro não é necessário, portanto pode cair em Remove Dead Code (237)
  5 - Depois que todos os chamadores originais tiverem sido alterados, use a Função Inline (115) na
função original.
  6 - Altere o nome da nova função e de todos os seus chamadores
  

 
  */

class HeatingPlanOld
{
  private object $temperatura_range;

  public function __construct()
  {
    $this->temperatura_range = (object) ['low' => -20, 'high' => 50];
  }

  public function withinRange($bottom, $top)
  {
    return ($bottom >= $this->temperatura_range->low) && ($top <= $this->temperatura_range->high);
  }
}
