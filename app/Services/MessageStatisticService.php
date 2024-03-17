<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Message;
use App\Models\MessageStatistic;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 *
 */
class MessageStatisticService
{
    /**
     * @param int $userId
     * @return void
     * @throws Throwable
     */
    public function createMessageStatistic(int $userId): void
    {
        DB::transaction(function () use ($userId) {
            $messageStatistic = new MessageStatistic();
            $messageStatistic->count = 1;
            $messageStatistic->user_id = $userId;
            $messageStatistic->saveOrFail();
        });
    }

    /**
     * @param MessageStatistic $messageStatistic
     * @return void
     * @throws Throwable
     */
    public function incrementMessageCount(MessageStatistic $messageStatistic): void
    {
        DB::transaction(function () use ($messageStatistic) {
            $messageStatistic->count++;
            $messageStatistic->saveOrFail();
        });
    }

    /**
     * В тестовом использую элок, не использую репозитории чтобы не оверкодить
     *
     * @param int $userId
     * @return MessageStatistic|null
     */
    public function getUserMessageStatistic(int $userId): ?MessageStatistic
    {
        return MessageStatistic::where('user_id', $userId)->first();
    }
}
