<?php

namespace RobM\WordPress\Service;

use RobM\WordPress\Exception\BadWordPressFunctionCallException;

use function Symfony\Component\String\u;

class MethodResolver
{
    public function resolve(string $method, array $arguments)
    {
        if ($this->isCamelCase($method)) {
            $method = u($method)->snake()->toString();
        }

        return $this->callFunction($method, $arguments);
    }

    private function callFunction(string $function, array $arguments)
    {
        if (function_exists($function)) {
            return $function(...$arguments);
        }

        throw new BadWordPressFunctionCallException($function);
    }

    private function isCamelCase(string $name): bool
    {
        return u($name)->camel()->toString() === $name;
    }
}
