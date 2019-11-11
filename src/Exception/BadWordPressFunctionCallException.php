<?php

namespace RobM\WordPress\Exception;

use BadFunctionCallException;
use Throwable;

class BadWordPressFunctionCallException extends BadFunctionCallException
{
    private const MESSAGE = 'Function "%s" is not callable outside of WordPress.';

    /**
     * @param string $function [optional] The WordPress function to display in the Exception message.
     * @param int $code [optional] The Exception code.
     * @param Throwable $previous [optional] The previous throwable used for the exception chaining.
     */
    public function __construct(string $function = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $function), $code, $previous);
    }
}
