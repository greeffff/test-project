<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Responses\StatisticMessageResponse;
use App\Services\MessageStatisticService;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class StatisticMessageController extends Controller
{

    /**
     * Получаем статистику сообщений для конкретного юзера
     *
     * @param int $userId
     * @param MessageStatisticService $messageStatisticService
     * @return JsonResponse
     */
    public function index(
        int $userId,
        MessageStatisticService $messageStatisticService,
    ): JsonResponse {
        $messageStatistic = $messageStatisticService->getUserMessageStatistic($userId);
        $messageStatisticResponse = new StatisticMessageResponse($messageStatistic);

        return response()->json($messageStatisticResponse->toArray());
    }
}
