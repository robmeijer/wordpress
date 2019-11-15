<?php

namespace RobM\WordPress;

interface WordPressAwareInterface
{
    public function setWordPress(WordPress $wordPress): void;
}
