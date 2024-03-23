<?php

namespace App\CatalogRefactoring\SplitLoop;


/**
 * Split Loop
 * Ao dividir o loop, você garante que só precisa entender o comportamento que precisa modificar.
 * Passos:
 * Copie o loop
 * Identifique e elimine os código duplicado
 * Test
 */
class Refactored
{
    public function getSalaryAndYoungest($people)
    {
        return "yougestAge: {$this->youngestAge($people)}, totalSalary: {$this->totalSalary($people)}";
    }
    private function totalSalary(array $people)
    {
        return array_reduce($people, fn ($total, $p) => $total += $p['salary'], 0);
    }
    private function youngestAge(array $people)
    {
        return  min(array_map(fn ($p) => $p['age'], $people));
    }
}
