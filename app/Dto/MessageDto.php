<?php

declare(strict_types=1);

namespace App\Dto;

use App\Http\Requests\CreateMessageRequest;

/**
 *
 */
class MessageDto
{
    /**
     * @param int $userId
     * @param string $text
     */
    private function __construct(public int $userId, public string $text)
    {
    }

    /**
     * @param CreateMessageRequest $request
     * @return MessageDto
     */
    public static function fromRequest(CreateMessageRequest $request): self
    {
        return new self($request->validated('userId'), $request->validated('text'));
    }
}
