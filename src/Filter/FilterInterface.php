<?php

namespace RobM\WordPress\Filter;

interface FilterInterface
{
    public function filter(...$args);

    public function getArguments(): int;

    public function getPriority(): int;
}
