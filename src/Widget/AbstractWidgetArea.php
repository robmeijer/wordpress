<?php

namespace RobM\WordPress\Widget;

abstract class AbstractWidgetArea implements WidgetAreaInterface
{
    /** @var string */
    protected $id = '';

    /** @var string */
    protected $name = '';

    /** @var string */
    protected $beforeWidget = '';

    /** @var string */
    protected $afterWidget = '';

    /** @var string */
    protected $beforeTitle = '';

    /** @var string */
    protected $afterTitle = '';

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBeforeWidget(): string
    {
        return $this->beforeWidget;
    }

    public function getAfterWidget(): string
    {
        return $this->afterWidget;
    }

    public function getBeforeTitle(): string
    {
        return $this->beforeTitle;
    }

    public function getAfterTitle(): string
    {
        return $this->afterTitle;
    }
}
