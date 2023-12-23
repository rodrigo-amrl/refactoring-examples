<?php

namespace App\CatalogRefactoring\ExtractFunction;

// Passos
//  Cria uma nova função e nomeie de acordo com a intenção da função, nomeie pelo que ela faz

/**
 * Extract Function
 * Passos: 
 *  - Crie uma nova função e nomeie de acordo com a intenção da função, nomeie pelo que ela faz
 *  - mova o código para a nova função
 *  - Verifica as variveís fora do escopo e passe como parâmetro
 *  - Se houver uma variável utilizadas apenas na função e declarada fora, mova a declararação para dentro da função.
 *  - Inclua a declaração da função no lugar do código extraído
 *  - Teste
 *
 *
 */
class Old
{

    public function PrintOwing($invoice)
    {
        $outstanding = 0;

        echo "***************************";
        echo "****** Customer Owes ******";
        echo "***************************";

        //calculate outstanding
        foreach ($invoice['orders'] as $o) {
            $outstanding += $o['amount'];
        }

        //record due date
        $today = date('Y-d-m');
        $invoice['due_date'] = date('Y-d-m', strtotime("+5 days " . $today));

        //print details
        echo "Name: " . $invoice['customer'];
        echo "Amount: " . $outstanding;
        echo "Due: " . $invoice['due_date'];
    }
}
