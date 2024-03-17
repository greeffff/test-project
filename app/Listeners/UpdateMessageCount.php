<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\MessageStoredEvent;
use App\Services\MessageStatisticService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Throwable;

/**
 *
 */
class UpdateMessageCount implements ShouldQueue
{

    /**
     * @param MessageStatisticService $messageStatisticService
     */
    public function __construct(
        protected readonly MessageStatisticService $messageStatisticService,
    ) {
    }

    /**
     * @param MessageStoredEvent $event
     * @return void
     * @throws Throwable
     */
    public function handle(MessageStoredEvent $event): void
    {
        $message = $event->getMessage();
        $messageStatistic = $this->messageStatisticService->getUserMessageStatistic($message->user_id);
        if (is_null($messageStatistic)){
            $this->messageStatisticService->createMessageStatistic($message->user_id);
            return;
        }
        $this->messageStatisticService->incrementMessageCount($messageStatistic);
    }
}
