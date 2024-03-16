<?php


namespace App\CatalogRefactoring\MoveStatementsToCallers;

/**
 * Move Statements To Callers
 * Passos
 * - Em circunstâncias simples, onde você tem apenas um ou dois chamadores e uma função simples para chamar,
 * baseta cortar a primeira linha da função chamada e colá-la nos chamadores.
 * - Caso contrário, aplique Extract Function a todas as instruções que você não deseja mover.
 * - Use Inline Function na função original.
 * - Aplique Declare Function Change na função extraída para renomeà-la com o nome original.
 */
class PersonRefactored
{

    public function renderPerson(array $person)
    {
        echo "<p>{$person['name']}</p>";
        echo $this->renderPhoto($person['photo']);
        echo $this->emitPhotoData($person['photo']);
        echo "<p>location: {$person['photo']['location']}</p>";
    }
    private function listRecentPhotos($photos)
    {
        foreach ($photos as $photo) {
            if ($photo['date'] <= $this->recentDateCutOff()) continue;
            echo "<div>\n";
            echo $this->emitPhotoData($photo);
            echo "<p>location: {$photo['location']}</p>";
            echo "</div>\n";
        }
    }
    private function emitPhotoData($photo)
    {
        echo "<p>{$photo['title']}</p>";
        echo "<p>date: {$photo['data']}</p>";
    }
    private function renderPhoto()
    {
        return "&#128512;";
    }
}
