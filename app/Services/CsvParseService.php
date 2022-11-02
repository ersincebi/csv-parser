<?php

namespace App\Services;

use App\Helpers\JsonHelper;
use App\Models\CsvParseModel;
use App\Results\ApiResult;
use JsonException;

abstract class CsvParseService
{
    /**
     * @param array $csvParseRequest
     * @return ApiResult
     */
    public static function add(array $csvParseRequest): ApiResult
    {
        $apiResult = new ApiResult();
        $listResult = array();

        foreach ($csvParseRequest as $row) {
            if (CsvParseModel::hasEmployeeIdOrEmail($row) === 0) {
                $listResult[] = CsvParseModel::add($row);
            }
        }

        if (!in_array(FALSE, $listResult, true)) {
            $apiResult->setSuccess(true);
            $apiResult->setData(JsonHelper::encode((array) CsvParseModel::getList()));
            $apiResult->setMessage('All datas added to database');
        } else {
            $apiResult->setSuccess(false);
            $apiResult->setMessage('Something went wrong');
        }

        return $apiResult;
    }

    /**
     * @return ApiResult
     * @throws JsonException
     */
    public static function getList(): ApiResult
    {
        $apiResult = new ApiResult();

        $result = CsvParseModel::getList();

        if ($result) {
            $apiResult->setSuccess(true);
            $apiResult->setData(JsonHelper::encode((array)$result));
        } else {
            $apiResult->setSuccess(false);
            $apiResult->setMessage('Something went wrong');
        }

        return $apiResult;
    }
}
