<?php

namespace App\CatalogRefactoring\MoveStatementsIntoFunction;

/**
 * Move Statements Into Function
 * Passos
 * - Se o código repetitivo não foir adjacente à chamada da função alvo, use Slide Statements, para torná-lo adjacente.
 * - Se a função destino for chamada apenas peloa função de origem, basta cortar o código da fonte, colá-lo
 * no destino, testar e ignorar o restante da mecânica.
 * - Se você tiver mais chamadores, use Extract Function em um dos sites de chamada para extrair a chamada 
 * para a função de destino e as instruções que você deseja mover para ela.
 * - Onverta todas a outras chamadas para unar a nova função.
 * - QUando todas as chamadas originais usarem a nova função, use Inline Function para incorporar completamente
 *  a função original na nova função, removendo a função original.
 * - use Rename Function para alterar o nome da nova função para o mesmo nome da função original.
 */
class PersonOld
{
    public function renderPerson($out_stream, $person)
    {
        $result = [];
        $result[] = "<p>{$person['name']}</p>";
        $result[] = $this->renderPhoto($person['photo']);
        $result[] = "<p>{$person['photo']['title']}</p>";
        $result[] = $this->emitPhotoData($person['photo']);
        return implode("\n", $result);
    }
    private function photoDiv($p)
    {
        return "<div><p>{$p['title']}</p>{$this->emitPhotoData($p)}</div>";
    }
    private function emitPhotoData($photo)
    {
        $result = [];
        $result[] = "<p>location: {$photo['location']}</p>";
        $result[] = "<p>date: {$photo['data']}</p>";
        return implode("\n", $result);
    }
    private function renderPhoto()
    {
        return "";
    }
}
