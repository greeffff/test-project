<?php

declare(strict_types=1);

namespace App\Responses;

use App\Models\Message;

/**
 * Респонс сообщения
 */
class MessageResponse extends AbstractResponse
{
    /**
     * @param Message $message
     */
    public function __construct(private Message $message)
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'userId' => $this->message->user_id,
            'text' => $this->message->text,
        ];
    }
}
