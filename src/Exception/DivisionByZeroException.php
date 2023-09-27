<?php

declare(strict_types=1);

namespace App\Exception;

class DivisionByZeroException extends \RuntimeException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
