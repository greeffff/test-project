<?php

declare(strict_types=1);

namespace App\Responses;

use App\Models\MessageStatistic;

/**
 * Респонс счетчика сообщений
 */
class StatisticMessageResponse extends AbstractResponse
{
    /**
     * @param MessageStatistic $messageStatistic
     */
    public function __construct(private MessageStatistic $messageStatistic)
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'userId' => $this->messageStatistic->user_id,
            'count' => $this->messageStatistic->count,
        ];
    }
}
