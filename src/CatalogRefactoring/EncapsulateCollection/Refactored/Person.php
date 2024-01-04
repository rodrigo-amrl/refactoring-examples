<?php

namespace App\CatalogRefactoring\EncapsulateCollection\Refactored;

use Exception;

class Person
{

    public function __construct(
        public string $name,
        public array $courses  = []
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCourses()
    {
        return $this->courses;
    }
    public function setCourses(array $list)
    {
        $this->courses = $list;
    }
    public function addCourse($course)
    {
        $this->courses[] = $course;
    }
    public function removeCourse($course)
    {
        if (empty($this->courses[key($course)])) throw new Exception('Course Not Found');
        unset($this->courses[key($course)]);
    }
}
