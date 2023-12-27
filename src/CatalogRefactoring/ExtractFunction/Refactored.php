<?php

namespace App\CatalogRefactoring\ExtractFunction;


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
class Refactored
{
    private string $invoice_print = '';

    public function PrintOwing($invoice)
    {
        $this->printBanner();
        $outstanding = $this->calculateOutstanding($invoice);
        $invoice['due_date'] = $this->defineDueDate();
        $this->printDetails($invoice, $outstanding);
        return $this->invoice_print;
    }
    private function printBanner()
    {
        $this->invoice_print .= "***************************"
            . "****** Customer Owes ******"
            . "***************************";
    }
    private function calculateOutstanding(array $invoice)
    {
        $result = 0;
        foreach ($invoice['orders'] as $o) {
            $result += $o['amount'];
        }
        return $result;
    }
    private function defineDueDate()
    {
        $today = date('Y-d-m');
        return date('Y-d-m', strtotime("+5 days " . $today));
    }
    private function printDetails(array $invoice, float $outstanding)
    {
        $this->invoice_print .= "Name: " . $invoice['customer']
            . "Amount: " . $outstanding
            . "Due: " . $invoice['due_date'];
    }
}
