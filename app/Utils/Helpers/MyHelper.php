<?php

namespace App\Utils\Helpers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MyHelper
{
    // pristupujes cez MyHelper::

     // PRICE FORMAT (if have currency use Wame Currency package)
     // ->displayUsing(fn($value)=>MyHelper::formatPrice($value))->asHtml()
     public static function formatPrice($price, $color=false)
     {
         $formattedSum = number_format($price, 2, ',', '.') . ' €';
 
         if ($color === false) return '<p class="font-bold">' . $formattedSum . '</p>';
         
         if ($price < 0) {
             return '<p class="text-red-600 font-bold">' . $formattedSum . '</p>';
         }
         return '<p class="text-green-600 font-bold">+' . $formattedSum . '</p>';
     }

    // CREDIT FORMAT
    public static function formatCredit(float $credit): string
    {
        if ($credit < 0) {
            return '<p class="text-red-600 font-bold">' . $credit . ' K </p>';
        }
        return '<p class="text-green-600 font-bold">+' . $credit . ' K </p>';
    }
    
    // API RESPONSE
    public static function notFound($message='Not found'): JsonResponse
    {
        return response()->json([
            'type' => 'error',
            'message' => $message,
            'code' => '404',
        ], 404);
    }


}
