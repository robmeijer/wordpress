<?php

namespace RobM\WordPress;

trait WordPressAwareTrait
{
    /** @var WordPress */
    protected $wordPress;

    public function setWordPress(WordPress $wordPress): void
    {
        $this->wordPress = $wordPress;
    }
}
