<?php

namespace App\Http\Controllers;

use App\Domains\Interfaces\Services\IAuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Token
 */
class AuthController
{
    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Obtem o token
     *
     * @bodyParam email string required Email de cadastro.  Exemplo: teste@test.com.br
     * @bodyParam password string required password cadastrado.  Exemplo: 123456
     *
     * @response {
     *      "success": true,
     *      "data": {
     *          "token" : "xxxx",
     *      }
     *  }
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $result = $this->authService->login($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }


    public function logout(Request $request): JsonResponse
    {
        $result = $this->authService->logout($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }
}
