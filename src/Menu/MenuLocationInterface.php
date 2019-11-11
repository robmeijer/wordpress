<?php

namespace RobM\WordPress\Menu;

interface MenuLocationInterface
{
    public function getLocation(): string;

    public function getDescription(): string;
}
