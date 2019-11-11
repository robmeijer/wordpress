<?php

namespace RobM\WordPress\Action;

abstract class AbstractAction implements ActionInterface
{
    /** @var int */
    protected $arguments = 1;

    /** @var int */
    protected $priority = 10;

    abstract public function action(...$args);

    public function getArguments(): int
    {
        return $this->arguments;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
