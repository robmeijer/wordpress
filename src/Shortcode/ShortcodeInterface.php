<?php

namespace RobM\WordPress\Shortcode;

interface ShortcodeInterface
{
    public function output(array $atts, string $content = ''): string;
}
