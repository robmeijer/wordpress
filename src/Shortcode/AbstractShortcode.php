<?php

namespace RobM\WordPress\Shortcode;

abstract class AbstractShortcode implements ShortcodeInterface
{
    abstract public function output(array $atts, string $content = '') : string;
}
