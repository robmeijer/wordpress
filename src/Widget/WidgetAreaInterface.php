<?php

namespace RobM\WordPress\Widget;

interface WidgetAreaInterface
{
    public function getId(): string;

    public function getName(): string;

    public function getBeforeWidget(): string;

    public function getAfterWidget(): string;

    public function getBeforeTitle(): string;

    public function getAfterTitle(): string;
}
