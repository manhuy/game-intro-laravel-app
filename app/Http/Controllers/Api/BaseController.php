<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;

class BaseController
{
    /**
     * JSON response status 
     * 
     */
    public function response($message = '', $data = [], $status = null): JsonResponse {

        $response = [
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response, $status, [
            //
        ]);
    }

    /**
     * JSON response status 200 OK 
     * 
     */
    public function responseOK($message = '', $data = []): JsonResponse {
        return self::response($message, $data, JsonResponse::HTTP_OK);
    }

    /**
     * JSON response status 201 Created
     * 
     */
    public function responseCreated($message = '', $data = []): JsonResponse {
        return self::response($message, $data, JsonResponse::HTTP_CREATED);
    }

    /**
     * JSON response status 400 Bad Request
     * 
     */
    public function responseBadRequest($message = '', $data = []): JsonResponse {
        return self::response($message, $data, JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     * JSON response status 404 Not Found
     * 
     */
    public function responseNotFound($message = '', $data = []): JsonResponse {
        return self::response($message, $data, JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * JSON response status 500 Internal Server Error
     * 
     */
    public function responseInternalServerError($message = '', $data = []): JsonResponse {
        return self::response($message, $data, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
