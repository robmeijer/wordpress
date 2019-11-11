<?php

namespace RobM\WordPress\Action;

interface ActionInterface
{
    public function action(...$args);

    public function getArguments(): int;

    public function getPriority(): int;
}
