<?php

namespace RobM\WordPress\Filter;

abstract class AbstractFilter implements FilterInterface
{
    /** @var int */
    protected $arguments = 1;

    /** @var int */
    protected $priority = 10;

    abstract public function filter(...$args);

    public function getArguments(): int
    {
        return $this->arguments;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
