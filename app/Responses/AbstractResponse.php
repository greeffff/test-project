<?php

declare(strict_types=1);

namespace App\Responses;

/**
 *
 */
abstract class AbstractResponse
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
