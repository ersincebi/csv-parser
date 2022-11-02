<?php

namespace App\Helpers;

use App\Results\ApiResult;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

abstract class GlobalHelper
{

    /**
     * @param ApiResult
     *
     * @return array
     */
    public static function objectToArray(ApiResult $apiResult): array
    {
        return $apiResult->toArray();
    }
}
