<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\MessageDto;
use App\Events\MessageStoredEvent;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 *
 */
class MessageService
{
    /**
     * Сохранить сообщение, привязал эвент к create сервиса, а не к методу модели
     *
     * @param MessageDto $messageDto
     * @return Message
     * @throws Throwable
     */
    public function create(MessageDto $messageDto): Message
    {
        return DB::transaction(function () use ($messageDto) {
            $message = new Message();
            $message->user_id = $messageDto->userId;
            $message->text = $messageDto->text;
            $message->saveOrFail();
            MessageStoredEvent::dispatch($message);
            return $message;
        });
    }
}
