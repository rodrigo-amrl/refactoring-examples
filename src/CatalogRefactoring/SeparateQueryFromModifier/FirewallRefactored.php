<?php

namespace App\CatalogRefactoring\SeparateQueryFromModifier;

/*

 Separate Query From Modifier
 Quando tenho uma função que me dá um valor e não tem efeitos colaterais observáveis, tenho algo
muito valioso. Posso chamar essa função quantas vezes quiser. Posso mover a chamada para
outros locais em uma função de chamada. É mais fácil testar. Resumindo, tenho muito menos com
que me preocupar.

Passos:
1- Copie a função e nomeie-a como uma consulta. Examine a função para ver o que é retornado. Se a consulta for usada para preencher uma variável,
o nome da variável deverá fornecer uma boa pista.
2- Remova quaisquer efeitos colaterais da nova função de consulta
3 - Execute verificações estáticas.
4 - Encontre cada chamada do método original. Se essa chamada usar o valor de retorno, substitua a
chamada original por uma chamada para a consulta e insira uma chamada para o método original abaixo dela.
Teste após cada alteração
5 - Remova os valores de retorno do original
6 - Teste
Muitas vezes, depois de fazer isso, haverá duplicação entre a consulta e o método original que pode ser
arrumado
 */

class FirewallRefactored
{

    public function __construct(
        protected bool $trigger_alarm = true
    ) {
    }

    public function alertForMiscreant($peaple)
    {
        $response = $this->findMiscreant($peaple);
        if (!empty($response))
            $this->setOffAlarms();
        return  $response;
    }
    public function findMiscreant($peaple)
    {
        foreach ($peaple as $p) {
            if ($p == 'Don') {
                return "Don";
            }
            if ($p == "John") {
                return "John";
            }
        }
        return "";
    }
    public function setOffAlarms()
    {
        $this->trigger_alarm = false;
    }
}
