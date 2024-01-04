<?php

declare(strict_types=1);

use App\CatalogRefactoring\EncapsulateCollection\Refactored\Person;
use App\CatalogRefactoring\EncapsulateCollection\Refactored\StudentCourse as RefactoredStudentCourse;
use PHPUnit\Framework\TestCase;

final class EncapsulateCollectionTest extends TestCase
{

    public function testSetCourses()
    {
        $studendCourse = new RefactoredStudentCourse();
        $person = new Person('Rodrigo', []);
        $studendCourse->setBasicCourses($person);
        $this->assertCount(3, $person->getCourses());
    }
}
