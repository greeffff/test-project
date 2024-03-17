<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Dto\MessageDto;
use App\Http\Requests\CreateMessageRequest;
use App\Responses\MessageResponse;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;
use Throwable;

class MessageController extends Controller
{
    /**
     * Подразумевается, что должен использоваться фасад auth для получения текущего юзера (поэтому Message не в папке User
     * тогда пришлось бы делать запросы POST /user/{id}/message для создания сообщения), но для тестирования я просто передаю
     * userId из реквеста
     *
     * @param CreateMessageRequest $request
     * @param MessageService $messageService
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(
        CreateMessageRequest $request,
        MessageService $messageService,
    ): JsonResponse {
        $createMessageDto = MessageDto::fromRequest($request);
        $message = $messageService->create($createMessageDto);
        $messageResponse = new MessageResponse($message);

        return response()->json($messageResponse->toArray());
    }
}
