<?php

namespace App\CatalogRefactoring\SplitLoop;


/**
 * Split Loog
 * Ao dividir o loop, você garante que só precisa entender o comportamento que precisa modificar.
 * Passos:
 * Copie o loop
 * Identifique e elimine os código duplicado
 * Test
 */
class Old
{

    const INFINIT = 999;
    public function getSalaryAndYoungest($people)
    {

        $youngest = $people[0] ? $people[0]['age'] : self::INFINIT;
        $totalSalary = 0;
        foreach ($people as $p) {
            if ($p['age'] < $youngest)
                $youngest = $p['age'];

            $totalSalary += $p['salary'];
        }

        return "yougestAge: {$youngest}, totalSalary: {$totalSalary}";
    }
}
