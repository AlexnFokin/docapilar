<?php

namespace App\helpers;

class ApiResponse
{
    /**
     *
     * @param  string  $message
     * @param  mixed   $data
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => 'success',
            'data' => $data
        ], $statusCode);
    }

    /**
     *
     * @param  string  $message
     * @param  mixed   $data
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message, $data = null, $statusCode = 500)
    {
        return response()->json([
            'message' => $message,
            'status' => 'error',
            'data' => $data
        ], $statusCode);
    }

    /**
     *
     * @param  mixed   $errors
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function validationError($errors, $statusCode = 422)
    {
        return response()->json([
            'message' => 'Validation failed.',
            'status' => 'error',
            'data' => $errors
        ], $statusCode);
    }

    /**
     *
     * @param  string  $message
     * @param  mixed   $data
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function badRequest($message, $data = null, $statusCode = 400)
    {
        return response()->json([
            'message' => $message,
            'status' => 'error',
            'data' => $data
        ], $statusCode);
    }

    /**
     *
     * @param  string  $message
     * @param  mixed   $data
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function created($message, $data = null, $statusCode = 201)
    {
        return response()->json([
            'message' => $message,
            'status' => 'success',
            'data' => $data
        ], $statusCode);
    }
}
