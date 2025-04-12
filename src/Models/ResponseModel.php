<?php

namespace Models;

class ResponseModel
{
    public static function success($message, $code = 200)
    {
        http_response_code($code);
        return json_encode([
            'status' => 'OK',
            'codeStatus' => $code,
            'message' => $message
        ]);
    }

    public static function error($message, $code = 400)
    {
        http_response_code($code);
        return json_encode([
            'status' => 'ERROR',
            'codeStatus' => $code,
            'message' => $message
        ]);
    }
}
