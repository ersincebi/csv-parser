<?php

namespace App\Helpers;

use JsonException;

abstract class JsonHelper
{
    /**
     * @param array $data
     * @return string
     * @throws JsonException
     */
    final public static function encode(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $data
     * @return mixed
     * @throws JsonException
     */
    final public static function decode(string $data): mixed
    {
        return json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    }
}
