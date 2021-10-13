<?php

namespace Gegosoft\Rxccoin\Exceptions;

use RuntimeException;

class RxccoindException extends RuntimeException
{
    /**
     * Construct new rxccoin exception.
     *
     * @param object $error
     *
     * @return void
     */
    public function __construct($error)
    {
        parent::__construct($error['message'], $error['code']);
    }
}
