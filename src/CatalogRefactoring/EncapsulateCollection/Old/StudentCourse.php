<?php

namespace App\CatalogRefactoring\EncapsulateCollection\Old;

use App\CatalogRefactoring\EncapsulateCollection\Factories\BasicCoursesFactory;

class StudentCourse
{


    public function numAdvancedCourses(Person $person)
    {
        return array_filter($person->getCourses(), fn ($c) => !!$c['is_advanced']);
    }
    public function setBasicCourses(Person $person)
    {
        $basic_courses_names = BasicCoursesFactory::make();
        $person->setCourses(array_map(fn ($name) => new Course($name, false), $basic_courses_names));
    }
    public function setBasicCoursesPush(Person $person)
    {
        foreach (BasicCoursesFactory::make() as $name) {
            $person->courses[] = new Course($name, false);
        }
    }
}
