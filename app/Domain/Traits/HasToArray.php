<?php

namespace App\Domain\Traits;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

trait HasToArray
{
    /**
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        return $this->classToArray($this);
    }

    /**
     * @throws ReflectionException
     */
    private function classToArray($entity, $recursionDepth = 2, bool $usePascalCase = true): array
    {
        $array = array();
        $class = new ReflectionClass(get_class($entity));
        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $methodName = $method->name;
            if (str_starts_with($methodName, "get") && strlen($methodName) > 3) {
                $propertyName = ($usePascalCase) ? $this->toPascalCase($methodName) : $this->toCamelCase($methodName);

                $value = $method->invoke($entity);

                if (is_object($value)) {
                    if ($recursionDepth > 0) {
                        $array[$propertyName] = $this->classToArray($value, $recursionDepth - 1);
                    } else {
                        $array[$propertyName] = "***";  // Stop recursion
                    }
                } else {
                    $array[$propertyName] = $value;
                }
            }
        }
        return $array;
    }

    /**
     * @param string $methodName
     * @return string
     */
    public function toCamelCase(string $methodName): string
    {
        return lcfirst(substr($methodName, 3));
    }

    /**
     * @param string $string
     * @return string
     */
    private function toPascalCase(string $string): string
    {
        return preg_replace_callback("/(?:^|_)([a-z])/", function ($matches) {
            return strtoupper($matches[1]);
        }, $string);
    }
}
