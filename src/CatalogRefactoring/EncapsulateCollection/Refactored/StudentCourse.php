<?php

namespace App\CatalogRefactoring\EncapsulateCollection\Refactored;

use App\CatalogRefactoring\EncapsulateCollection\Factories\BasicCoursesFactory;

/**
 * Encapsulate Collection
 * Buscar encapsular quaisquer dados mutaveis, isso torna mais fácil
 * ver quando e como as estruturas são modificadas.
 * Passos
 * - Aplique o Encapsulate Variable se a referência a coleção ainda não estiver encapsulada
 * - Adicione funções para adicionar e remover elementos da coleção.
 * - Exetute verificações estáticas
 * - Encontre todas as referências à coleção. Se alguém chamar modificadores na coleção altere-osp ara 
 * usar as novas funções adicionar/remover.
 * - Modifique o getter da coleção para retornar uma visualização protegida.
 * - 
 */
class StudentCourse
{


    public function numAdvancedCourses(Person $person)
    {
        return array_filter($person->getCourses(), fn ($c) => !!$c['is_advanced']);
    }
    public function setBasicCourses(Person $person)
    {
        foreach (BasicCoursesFactory::make() as $name) {
            $person->addCourse(new Course($name, false));
        }
    }
}
