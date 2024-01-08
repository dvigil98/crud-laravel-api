<?php

namespace App\Http\Responses;

trait RespondsWithHttpStatus
{
    protected function responseWithData($code = 200, $message = '', $data = [])
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function response($code = 200, $message = '')
    {
        return response()->json([
            'code' => $code,
            'message' => $message
        ], $code);
    }
}
