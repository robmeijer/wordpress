<?php

namespace RobM\WordPress\Menu;

abstract class AbstractMenuLocation implements MenuLocationInterface
{
    /** @var string */
    protected $location = '';

    /** @var string */
    protected $description = '';

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
